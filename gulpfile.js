// Chargement des plugins nécessaires
const gulp = require('gulp');
const cleanCSS = require('gulp-clean-css'); // Pour minifier le CSS
const concat = require('gulp-concat'); // Pour concaténer les fichiers CSS
const path = require('path');

// Tâche pour minifier et concaténer tous les fichiers CSS dans un fichier styles.min.css à la racine
gulp.task('minify-css', () => {
  return gulp.src('assets/css/**/*.css') // Source de tous les fichiers CSS dans le dossier assets/css
    .pipe(concat('styles.min.css')) // On concatène tous les fichiers CSS en un seul
    .pipe(cleanCSS({ compatibility: 'ie8' })) // On minimise le fichier CSS
    .pipe(gulp.dest(path.join(__dirname, 'styles.min.css'))) // On met le fichier styles.min.css à la racine
});

// Tâche par défaut
gulp.task('default', gulp.series('minify-css'));
