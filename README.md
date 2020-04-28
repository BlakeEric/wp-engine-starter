WP Engine WordPress starter
===
This is a starter repo meant to make WordPress development more DRY and to integrate projects more easily with WP Engine using modern dev practices.

This repository contains:
* Some boilerplate functionality in `wp-content/mu-plugins` for cleaning up the admin dashboard, initializing custom post types, etc.
* A starter theme based on [underscores](https://github.com/automattic/_s) and [susty](https://sustywp.com/)

Both the starter theme and the mu-plugins contain comments and code examples that can be used for reference.

You may also notice that the prefix `myprefix_` is used in function names throughout the repository. Feel free to do a search and replace to insert your own prefix.

Getting Started
---------------

Although this project has been developed with the goal of not overcomplicating WordPress development, it does require some more modern development practices.

You need to know at least the basics of the following:
* Some knowledge of SASS (scss) is required (http://sass-lang.com/)
* Concepts of Version Control (https://git-scm.com/book/en/v2/Getting-Started-About-Version-Control)
* Front-end frameworks - this starter uses 'Foundation' (https://foundation.zurb.com/sites/docs/) for new projects.
* Concepts of PACKAGE MANAGEMENT (https://docs.npmjs.com/getting-started/what-is-npm).  
* Gulp - a JavaScript task runner used for compiling JS and CSS files (https://gulpjs.com/).

---------------

1. Install the following software on your machine.

* Git: (https://git-scm.com/)
  Git is a version control system that allows you to track changes in your code. When you integrate Git with Github (https://github.com/) you have a private online directory of all the changes you made in your project.

* NPM: (https://docs.npmjs.com/getting-started/installing-node)
  NPM is a package manager for node.js. It allows you to download code packages using your command line directly into your project.

* Gulp: (https://github.com/gulpjs/gulp/blob/v3.9.1/docs/getting-started.md)
  Gulp allows us to automate tasks in our theme like SASS compilation, css minification and autoprefixing, JS minifacation etc. Gulp packages are installed using NPM.

---------------

2. Download the current version of WordPress and the starter project

 * Download the current version of WordPress: (https://wordpress.org/download/), configure your local database, run the install, and do whatever else you need to be able to work locally.
 * Download the contents of this repository into the root directory of your new WordPress install. This will overwrite the contents of the `wp-content` folder, which is what we want!
 * NOTE: This repo DOES NOT include any of the WordPress core files. That means that it will work independently of the WordPress core version, and will NOT change or effect any WordPress core files.
 * To explore this further, open the `.gitignore` file:
 * The `.gitignore` file tells our Git repository which files NOT to track. Our `.gitignore` lists all the WordPress core files, files that are specific to the WP Engine hosting platform, files that contain sensitive information (`wp-config.php`) and any other files that are not necessary for us to track in our repository. Read more about ignoring files here: https://git-scm.com/docs/gitignore
 * If you navigate to `wp-content/themes/my-theme` you will see there is an additional `.gitignore` file. Git repositories can also include `.gitignore` files in subdirectories. This one specifies files from our theme that are only necessary in development. When you open the file you will see that the `node_modules` directory is ignored. The `node_modules` directory contains the packages downloaded using NPM. We only use these packages in the development environment to compile scss files into css. When the theme is uploaded to a live or staging environment the compiled css is included, and the packages used in `node_modules` are not necessary. NPM will be discussed in step (#).

---------------

3. Initialize a new Git repository

 At this point you should initialize a new Git repository. This will allow you to track changes and push your changes to WP Engine without using FTP. Do it now, it's way better this way!

  * Make sure you have Git installed on your computer: (https://git-scm.com/)
  * Open the command line and navigate to the root directory of the project you just copied the starter theme into.
  * enter the following command: `git init`.
  * You just created a new git repository (assuming you installed git correctly, are in the correct directory, and have no other errors).
  * enter the following commands: `git add .`, and `git commit -m"initial commit"`
  * You just 'committed' all the tracked files in your project to your new Git repository.

---------------

4. Sync your local Git repository with a GitHub repo.

  * Now you have a Git repository on your computer, but it is much easier to view and reference your files if you connect with Github:
  * You will need to have ssh configured to use a Github workflow. Follow this guide to set it up: https://help.github.com/articles/connecting-to-github-with-ssh/
  * Navigate to your Github user dashboard: https://github.com/
  * Find and click the button that says "new repository"
  * Create a computer-friendly name for the project, like `my-wordpress-project` for example.
  * Add a brief description.
  * Choose the 'private' setting
  * Leave everything else unchecked and hit "Create Repository".
  * Now, to connect your repository with GitHub make sure you are in the root directory of your project in the command line, and enter `git remote add origin <YOUR REPOSITORY Location>.git`.
  * Assuming you have no errors, enter  `git push origin master`. Your terminal should display some info, and a confirmation that the repository was pushed.
  * Refresh your Github window and you should see your repository files.
  * Notice that the Github repository does not contain the WP core files. That's because we ignored them in the git repository. Since we never edit the WP core files our selves there is no reason to track our changes. Additionally this means that Git will not DELETE any Wordpress core files when we push our changes to a live site, only changes to the files contained in our repository will be made, and the WordPress core files will not be changed. (This allows the wp-engine specific core files to be added on their remote servers, which are different then core files in a local WordPress install, and to update the WordPress core without needing to commit to our repository)

  ---------------

  5. Practice using Git.
  * Using the following guide, practice making changes to your project files (try adding a comment in your code, for example): http://rogerdudler.github.io/git-guide/ (scroll down to the "Workflow section" and read through the "merging" section)
  * The workflow is basically:
    * Make change and save files
    * use the `git add -a` for all files or `git add <filepath>` to choose which files to stage for commit
    * commit the changes to the repository with `git commit -m"<description of changes made>"`
    * push the changes to the Github repository using  `git push origin master` or `git push origin [your_custom_branch name]`
    * View the changes in Github.
    * Later on we will be able to push the changes directly to our staging or production environment on WP Engine!

Learn the general file structure and principles
---------------
  * Follow the WordPress style guides for php, html and inline comments:  
  - https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/
  - https://make.wordpress.org/core/handbook/best-practices/coding-standards/javascript/
  * Use mu-plugins as much as possible, download as few 3rd party plugins as possible
  * Separate PHP from markup. Keep markup in theme files, Put php functions in an mu-plugin if dealing with DB or admin functionality, or anything that works outside of the theme. (see the example instagram-feed in `wp-content\mu-plugins` for example. PHP functions in this module are created within an mu-plugin, and made available to integrate with markup in the theme).
  * Theme specific functions, like template tags, should be kept in the theme's `/lib` directory. This keep logic separate from markup. Anytime you use the same code in more than one template you should consider moving it to a function in a separate file, and initializing it in `functions.php`. That way you can edit one function instead of hunting down the same code in multiple files every time you make a change.

---------------

Plugin development

  * Custom plugins should be used for any features that are not integral to the theme. By separating the logic into a self-contained module it is easier to provide functions that can be used within a theme, while keeping the logic more maintainable. For examples see the functions provided in the custom instagram and facebook feeds in `mu-plugins`.

Theme development
---------------

General practices
  * The foundation icon font is included by default. Use it instead of images when possible. The icon font renders vector svg's (so they don't get blurry when you increase the size or when viewing on a retina display). The size of the icon can be changed via `font-size` in css or SASS.  (https://zurb.com/playground/foundation-icon-fonts-3)
  * Make sure you understand the concepts of Foundation, only add your own styles or javascript features when Foundation does not have a feature for the functionality you want: https://foundation.zurb.com/sites.html
  * Understand and follow WordPress coding standards. (https://codex.wordpress.org/WordPress_Coding_Standards)
------

SASS workflow
  * understand how to work with SASS. Read this for example: http://sass-lang.com/guide
  * understand how to run tasks in your terminal/command line using Gulp . Read this for example: https://www.sitepoint.com/introduction-gulp-js/
  * This is where NPM comes into play. Make sure you have NPM downloaded on your machine: https://docs.npmjs.com/getting-started/installing-node
  * Navigate to your theme directory root.
  * enter `npm install` in the command line. If you get errors, google them. If not you should see a message that says `<some number> packages installed`.
  * you just installed all packages necessary to compile sass to the final css
  * in the theme direcory, take a look at the `package.json` file. This is the file NPM just referenced when you entered `npm install`. It downloaded all the packages listed under `devDependencies` to a folder named `node_modules`. (`node_modules` is specified in the theme's `.gitignore` file, so these packages are only available in development. However, `package.json` is NOT ignored. This means that anyone that has the `package.json` can immediately download the same packages into their project.)
  * enter `gulp watch` in the command line. You should see some output indicating the files being watched.
  * open any file in the `sass` folder. Add a space or a comment and save. At this point you should see some output in your terminal window indicating the sass was compiled to css.
  * open the `dist/css` folder. You will see a new css file that was written by the `gulp watch` script.
  * open the theme's `functions.php`, and see this line: `wp_enqueue_style( 'bc-style', get_template_directory_uri() . '/dist/css/style.css' );`. This loads the COMPILED css in our theme. You will notice a change in style when you open the site in your browser. That is because the css file being enqueued did not exist until it was compiled by Gulp.
  * you will use this pattern whenever you make styling changes in the theme. NEVER edit the `dist/css` file directly. ALWAYS edit the original scss files while watching the directory with `gulp watch`
  * if you ever need to make a quick scss change you can enter `gulp styles` in the command line to compile immediately (you won't see your css changes in the browser until you compile the sass)
  * ALWAYS keep the sass files organized, and separated, this makes it much easier to maintain when trying to edit styles for a specific feature. You can import as many SASS files as you want and they will compile to a single minified css file.

-- What is Gulp? --
  * Gulp is a build tool used to enqueue Node.js scripts. It is used to automate repetitive tasks and make our workflow more efficient. Read more about Gulp at https://gulpjs.com/

Javascript Workflow
  * For Javascript we abide by the philosophy of LESS IS MORE. Javascript is a wonderful tool for enhancing the user experience, however we cannot assume that the browser has Javascript enabled, so all theme features need to work server-side before any JS is used.
  * Javascript files are automagically compiled and compressed into `dist/js/` using Gulp. The `gulp watch` command will watch all files in the `js/` directory and compile then automatically on save. Enqueued js files should be pulled from the `dist/js/` directory for faster load times. Make sure you enqueue the script in `functions.php` if you add a new file.
  * If you make a change to a js file and are not running `gulp watch` you can run `gulp scripts` to compile the JavaScript immediately.



---------------
Using WP Engine:
---------------

  WP Engine is our hosting provider (https://my.wpengine.com/). All of our WordPress sites are hosted on WP Engine. This platform offers features not included in many WordPress hosts such as:

  * Reliable backups. Learn more here: https://wpengine.com/support/restore/
  * A staging environment for testing changes before deploying: https://wpengine.com/support/staging/
  * SFTP functionality: https://wpengine.com/support/sftp/
  * Git integration to push changes directly via the terminal: https://wpengine.com/git/
  * Free SSL certificates, Great support, and many other things: https://wpengine.com/support/

-----------
Deployment Workflow

NOTE: This documentation assumes you already have a blank WP Engine install for your project.

When creating a new project it is important to integrate your local install with a WP Engine install IMMEDIATELY. This helps accomplish the following:

  * Makes sure any errors that might be caught only on a remote server are repaired early.
  * Allows others to view and edit content on WP Engine while the site is in development
  * Adds one more copy of a project in case of disaster.
  * Makes it easier to collaborate.

Integrating with WP Engine's git functionality:

  Add your SSH key to WP Engine.
  When you integrated your machine with GitHub, you were required to create an SSH key. You will use this same key to deploy code to WP Engine.

  All users must do the following:

  * Paste your SSH key into the your project's "git push" tab. Since you have used this key on another install WP Engine will notify you that it is already in use, and ask if you would like to re-use the same key. Click yes. Note that it takes around 10-20 minutes for the key to start working.
  * The "Git push" tab contains directions in the right sidebar to confirm connectivity.
  * Once your SSH key is working you must connect your local git repository with the WP Engine install.
  In your command line navigate to your root project directory, and type `git status` to confirm your repository has no pending errors.
  * Enter the following in the command line `git remote add production git@git.wpengine.com:production/<install_name>.git`
  * Enter the following in the command line `git remote add staging git@git.wpengine.com:staging/<install_name>.git`
  * You just created git endpoints to directly push your project to WP Engine.
  * now you can push using `git push staging master`, or `git push production master`

  Some notes about pushing to WP Engine:

  * You can utilize git to push template and mu plugin files to WP Engine, but not database content.
  * Files not in the repository will not be effected when pushing to WP Engine, this means that WP Engine-specific files and plugins can remain intact even when we push our local files to WP Engine.
  * Pushing to staging will not work unless you have initialized the staging site by clicking "Copy to staging" in the site's wp-admin WP Engine tab.
  * Sometimes files deleted in the git repo do not get cleared out of the WP Engine install, and it may be necessary to delete via SFTP.
  * If you are worried that pushing may cause an error, simply create a backup in the WP Engine dashboard before doing so.

-----------
Migrating content:

  It is important to copy content between local and and remote sites to keep everything in sync.
  Content can be shared between staging and production sites using the WP Engine staging tab.

  Copying content between local and staging/production can be done using the "All-in-one WP Migration plugin" (https://wordpress.org/plugins/all-in-one-wp-migration/). This plugin allows you to download content as a file and upload to another site. It takes care of all the url rewrites for you.

Using the "All-in-one WP Migration" plugin
  * Install and activate the plugin on both local and staging/production sites.
  * Login to the site you wish to copy content FROM
  * Click the "WP All-in-one migration" link in the dashboard. Make sure you are in the "export" tab.
  * Toggle the "Advanced options menu" and CHECK EVERYTHING EXCEPT "Do not export media library (files)" and "Do not export database (sql)". This ensures that our git-ified plugin and theme files will not be effected and we will ONLY export media and content.
  * Click "Export to -> File" to download.
  * Login to the site you are migrating TO.  
  * Click the "WP All-in-one migration" link in the dashboard. Make sure you are in the "import" tab.
  * Select "import from -> file" and choose the file you just downloaded.
  * This will automagically copy all content while taking care of rewrites.

  NOTE - This free plugin has a max export size of 512mb. In the event that you are exporting a very large site you can choose to export ONLY the database content by CHECKING EVERYTHING EXCEPT "Do not export database (sql)" in the advanced options in the export tab. Then you can download the wp-uploads directory from the WP-Engine dashboard backup tab, and place it into your development site, or upload it via SFTP when copying to a remote site.
