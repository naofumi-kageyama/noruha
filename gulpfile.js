import pkg from './package.json' with { type: 'json' };

import gulp from 'gulp';
import path from 'path';

import zip from 'gulp-zip';
import browserSyncLib from 'browser-sync';
import rename from 'gulp-rename';
import sourcemaps from 'gulp-sourcemaps';

import * as dartSass from 'sass';
import gulpSass from 'gulp-sass';
import postcss from 'gulp-postcss';
import tailwindPostcss from '@tailwindcss/postcss';
import cssnano from 'cssnano';
import cleanCSS from 'gulp-clean-css';

import { build } from 'esbuild'

import webp from 'gulp-webp'
import changed from 'gulp-changed'

import { fileURLToPath } from 'url';
import { dirname } from 'path';

const __filename = fileURLToPath(import.meta.url);
const __dirname = dirname(__filename);

const { src, dest, series, parallel, watch } = gulp;
const sass = gulpSass(dartSass);
const browserSync = browserSyncLib.create();

const srcRoot = "./src/";
const distRoot = "./dist/";
const productionRoot = "./production/";

const paths = {
  scss: {
    src: `${srcRoot}scss/**/*.scss`,
    dist: `${distRoot}css/`
  },
  tailwind: {
    src: `${srcRoot}tailwind/tailwind.css`,
    dist: `${distRoot}css/`,
    watch: [`${srcRoot}tailwind/**/*.css`, '**/*.php', '**/*.html'],
  },
  ts: {
    src: `${srcRoot}ts/index.ts`,
    dist: `${distRoot}js/`,
    watch: `${srcRoot}ts/**/*.ts`,
  },
  img: {
    src: `${srcRoot}images/**/*.{png,jpg,jpeg,gif}`,
    dist: `${distRoot}images/`
  },
};

const releaseFiles = [
  '**',
  `!${srcRoot}**`,
  '!node_modules',
  '!node_modules/**',
  '!gulpfile.js',
  '!package-lock.json',
  '!package.json',
  `!${paths.scss.dist}**/*.map`,
  `!${paths.scss.dist}**/!(*.min).css`,
  `!${paths.ts.dist}*.map`,
  `!${productionRoot}/**`,
];

const reload = (done) => { browserSync.reload(); done(); };

const scss = function () {
  return src(paths.scss.src)
    .pipe(sourcemaps.init({loadMaps: true}))
    .pipe(sass({
      outputStyle: 'expanded',
      includePaths: [path.resolve(__dirname, 'src/scss')]
    }).on('error', sass.logError))
    .pipe(dest(paths.scss.dist))
    .pipe(cleanCSS({ compatibility: 'ie11' }))
    .pipe(rename({ suffix: '.min' }))
    .pipe(sourcemaps.write('.', { includeContent: false }))
    .pipe(dest(paths.scss.dist))
    .pipe(browserSync.stream());
};

const tailwind = function () {
  return src(paths.tailwind.src)
    .pipe(postcss([tailwindPostcss()]))
    .pipe(dest(paths.tailwind.dist))
    .pipe(postcss([cssnano()]))
    .pipe(rename({ suffix: '.min' }))
    .pipe(dest(paths.tailwind.dist))
    .pipe(browserSync.stream());
};

const ts = async function () {
  await build({
    entryPoints: [paths.ts.src],
    bundle: true,
    outfile: `${paths.ts.dist}/bundle.js`,
    target: 'es2019',
    sourcemap: true,
    minify: true,
  })
}

const img = function () {
  return src(paths.img.src, { encoding: false })
    .pipe(changed(paths.img.dist, { extension: '.webp' }))
    .pipe(webp({ quality: 80 }))
    .pipe(dest(paths.img.dist));
};

const serve = function () {
  browserSync.init({
    proxy: "https://localhost:8000",
    port: 3000,
    notify: false,
    open: true
  });
  watch(paths.scss.src, scss);
  watch(paths.tailwind.watch, { ignored: ['node_modules/**', 'production/**', `${srcRoot}scss/**`] }, tailwind);
  watch(paths.ts.watch, series(ts, reload));
  watch(paths.img.src, series(img, reload));
  watch(['**/*.php', '**/*.html', '!node_modules/**', '!production/**', `!${srcRoot}**`], reload);
};

const makeFolder = function() {
  return src(releaseFiles, { encoding: false })
    .pipe(dest(`${productionRoot}${pkg.name}`))
}

const makeZip = function() {
  return src(releaseFiles, { encoding: false })
    .pipe(zip(`${pkg.name}.zip`))
    .pipe(dest(productionRoot))
}

const production = series(scss, tailwind, ts, img, makeFolder, makeZip);

export default series(scss, tailwind, ts, img, serve);
export { production, tailwind };