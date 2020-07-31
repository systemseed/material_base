<?php

/**
 * @file
 * Contains a Subtheme generation script.
 */

define('GENERATOR_TEMPLATE_FOLDER', 'material_base_subtheme');
define('GENERATOR_PLACEHOLDER', 'THEMENAME');

define('GENERATOR_DEFAULT_THEMENAME', 'material_top');
define('GENERATOR_DEFAULT_THEMES_PATH', '../../custom');      // Default path should be relative

// Getting project name from environment variables
if ($project = getenv('PROJECT_NAME')) {
  define('GENERATOR_THEMENAME', 'material_' . $project);
} else {
  define('GENERATOR_THEMENAME', GENERATOR_DEFAULT_THEMENAME);
}

/**
 * Main function.
 */
handle_arguments($argv, $argc);

/**
 * Resolve options from command line arguments.
 * Execute generate function with corresponding options.
 *
 * @param $args
 *  Array of command line arguments.
 *
 * @param $args_count
 *  Amount of command line arguments.
 *
 * @return
 *  Result of executing generate function.
 */
function handle_arguments($args, $args_count) {

  // Handling arguments by amount 
  if ($args_count == 1) {
    // No args.
    return generate_subtheme();
    
  } elseif ($args_count == 2) {
    // 1 argument.

    if ($args[1] == '-h' || $args[1] == '--help' || $args[1] == 'help') {
      // Argument is help calling.
      return show_help();

    } else {
      // Check that argument is valid themename
      if (validate_themename($args[1])) {
        // Executing generation
        $variables['themename'] = $args[1];
        return generate_subtheme($variables);

      } else {
        echo 'Theme name not valid.' . PHP_EOL;
        exit(1);
      }
    
    }

  }  elseif ($args_count == 3) {
    // 2 argument.

    // Check that 1st argument is valid themename
    if (validate_themename($args[1])) {

      // Check that 2nd argument is existing path
      if ($path = validate_path($args[2])) {

        // Executing generation
        $variables['themename'] = $args[1];
        $variables['path'] = $path;
        return generate_subtheme($variables);

      } else {
        echo 'Path not valid.' . PHP_EOL;
        exit(1);
      }

    } else {
      echo 'Theme name not valid.' . PHP_EOL;
      exit(1);
    }

  } else {
    // More than 2 arguments.
    echo 'Too many arguments.' . PHP_EOL;
    exit(1);
  }

}

/**
 * Show help message.
 *
 * @return
 *  Exiting script.
 */
function show_help() {

  echo 'Subtheme generator' . PHP_EOL;
  echo PHP_EOL;
  echo 'Usage: ' . PHP_EOL;
  echo '  php generate.php [themename] [path to themes folder]' . PHP_EOL;
  echo PHP_EOL;
  echo 'Examples: ' . PHP_EOL;
  echo '  php generate.php' . PHP_EOL;
  echo '  php generate.php westeros' . PHP_EOL;
  echo '  php generate.php westeros "../../custom"' . PHP_EOL;
  echo '  php generate.php westeros "/var/www/html/web/themes/custom"' . PHP_EOL;
  exit;

}

/**
 * Validate themename.
 *
 * @param $name
 *  Name for validate.
 *
 * @return
 *  TRUE if name valid,
 *  FALSE if name not valid.
 */
function validate_themename($name) {

  if (preg_match('/^[a-z0-9_]+$/', $name)) {
    return TRUE;
  } else {
    echo 'Theme name should contain only lowercase alphanumeric characters and underscores.' . PHP_EOL;
    return FALSE;
  }

}

/**
 * Validate path.
 *
 * @param $name
 *  Path for validate.
 *
 * @return
 *  Absolute path if path valid,
 *  FALSE if path not valid.
 */
function validate_path($path) {

  if (substr($path, 0, 1) == '/') {
    // Absolute path
    if (is_dir($path)) {
      return realpath($path);
    } else {
      echo '"' . $path . '" is not a valid path to folder.' . PHP_EOL;
      return FALSE;
    }
  } else {
    // Relative path
    if (is_dir(__DIR__ . DIRECTORY_SEPARATOR . $path)) {
      return realpath(__DIR__ . DIRECTORY_SEPARATOR . $path);
    } else {
      echo '"' . __DIR__ . DIRECTORY_SEPARATOR . $path . '" is not a valid path to folder.' . PHP_EOL;
      return FALSE;
    }
  }

  // TODO: Handle Windows absolute paths

}

/**
 * Generate subtheme.
 *
 * @param $args
 *  Array of arguments.
 *
 * @return
 *  Nothing.
 */
function generate_subtheme($variables = []) {

  if (isset($variables['themename'])) {
    $themename = $variables['themename'];
  } else {
    $themename = GENERATOR_THEMENAME;
  }

  if (isset($variables['path'])) {
    // Already valid path
    $path = $variables['path'];
  } else {
    // Checking default path is valid
    $path = __DIR__ . DIRECTORY_SEPARATOR . GENERATOR_DEFAULT_THEMES_PATH;
    if (!is_dir($path)) {
      // Creating default path folder
      if (!mkdir($path)) {
        echo 'Can not create "' . $path . '".'. PHP_EOL;
        exit(1);
      } 
    }
    // Providing valid path
    $path = realpath($path);
    
  }

  $theme_path = $path . DIRECTORY_SEPARATOR . $themename;

  // Copy template folder to themes folder
  copy_template_folder($theme_path);

  // Rename files containing placeholder
  rename_template_files($theme_path, $themename);

  // Replace placeholders in files content
  replace_template_placeholders($theme_path, $themename);

  // Unhide theme and update human name
  update_theme_info($theme_path, $themename);

  echo 'Theme "' . $themename . '" was successfully generated.' . PHP_EOL;
  exit;

}

/**
 * Copy template folder.
 *
 * @param $destination
 *  Path to new theme folder.
 *
 * @return
 *  Result of executing.
 */
function copy_template_folder($destination) {

  return copy_folder(__DIR__ . DIRECTORY_SEPARATOR . GENERATOR_TEMPLATE_FOLDER, $destination);

}

/**
 * Recursively copy folder.
 *
 * @param $source
 *  Path to source.
 *
 * @param $destination
 *  Path to destination.
 * 
 * @return
 *  TRUE if success.
 */
function copy_folder($source, $destination) {

  // Getting folder content
  if (!$folder = opendir($source)) {
    echo 'Can not open "' . $source . '".'. PHP_EOL;
    exit(1);
  }

  // Check for destination folder already exist
  if (is_dir($destination)) {
    echo 'Destination folder "' . $destination . '" already exists, skipping.' . PHP_EOL;
    // Not an error
    exit;
  }

  // Creating destination folder
  if (!mkdir($destination)) {
    echo 'Can not create "' . $destination . '".'. PHP_EOL;
    exit(1);
  }

  while(FALSE !== ($file = readdir($folder))) {
    if (($file != '.') && ($file != '..')) {

      $source_file = $source . DIRECTORY_SEPARATOR . $file;
      $destination_file = $destination . DIRECTORY_SEPARATOR . $file;

      if (is_dir($source_file) ) {
        copy_folder($source_file, $destination_file);
      } else {
        // Copying
        if (!copy($source_file, $destination_file)) {
          echo 'Can not copy "' . $source_file . '" to "' . $destination_file . '".' . PHP_EOL;
          exit(1);
        }
      }

    }
  }

  closedir($folder);
  return TRUE;
}

/**
 * Recursively rename template files.
 *
 * @param $path
 *  Path to theme folder.
 *
 * @param $themename
 *  Name of the theme.
 * 
 * @return
 *  TRUE if success.
 */
function rename_template_files($path, $themename) {

  // Getting folder content
  if (!$folder = opendir($path)) {
    echo 'Can not open "' . $path . '".'. PHP_EOL;
    exit(1);
  }

  while(FALSE !== ($file = readdir($folder))) {
    if (($file != '.') && ($file != '..')) {

      $target_file = $path . DIRECTORY_SEPARATOR . $file;

      if (is_dir($target_file) ) {
        rename_template_files($target_file, $themename);
      } else {

        // Checking filename has placeholder
        if (strpos($file, GENERATOR_PLACEHOLDER) !== FALSE) {
          // Preparing new file path
          $new_file = $path . DIRECTORY_SEPARATOR . str_replace(GENERATOR_PLACEHOLDER, $themename, $file);

          // Renaming
          if (!rename($target_file, $new_file)) {
            echo 'Can not rename "' . $target_file . '" to "' . $new_file . '".' . PHP_EOL;
            exit(1);
          }

        }
      }

    }
  }

  closedir($folder);
  return TRUE;
  
}

/**
 * Recursively replace template placeholders
 *
 * @param $path
 *  Path to theme folder.
 *
 * @param $themename
 *  Name of the theme.
 * 
 * @return
 *  TRUE if success.
 */
function replace_template_placeholders($path, $themename) {

  // Getting folder content
  if (!$folder = opendir($path)) {
    echo 'Can not open "' . $path . '".'. PHP_EOL;
    exit(1);
  }

  while(FALSE !== ($file = readdir($folder))) {
    if (($file != '.') && ($file != '..')) {

      $target_file = $path . DIRECTORY_SEPARATOR . $file;

      if (is_dir($target_file) ) {
        replace_template_placeholders($target_file, $themename);
      } else {
        $file_content = file_get_contents($target_file);
        $replace = 0;
        $file_content = str_replace(GENERATOR_PLACEHOLDER, $themename, $file_content, $replace);
        if ($replace) {
          if (!file_put_contents($target_file, $file_content)) {
            echo 'Can not write to "' . $target_file . '".' . PHP_EOL;
            exit(1);
          }
        }
      }

    }
  }

  closedir($folder);
  return TRUE;
  
}

/**
 * Update theme properties in THEMENAME.info.yml.
 * Comment out 'hidden: true', create human readable name.
 *
 * @param $path
 *  Path to theme folder.
 *
 * @param $themename
 *  Name of the theme.
 * 
 * @return
 *  TRUE if success.
 */
function update_theme_info($path, $themename) {

  $info_file = $path . DIRECTORY_SEPARATOR . $themename . '.info.yml';
  $name = ucfirst(str_replace('_', ' ', $themename));

  $file_content = file_get_contents($info_file);
  // Commenting out 'hidden' property
  $file_content = str_replace('hidden: true', '# hidden: true', $file_content);
  // Updating theme name
  $file_content = str_replace('name: Theme name', 'name: ' . $name, $file_content);
  if (!file_put_contents($info_file, $file_content)) {
    echo 'Can not write to "' . $info_file . '".' . PHP_EOL;
    exit(1);
  }

  return TRUE;
  
}
