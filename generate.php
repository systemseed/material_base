<?php

/**
 * @file
 * Contains a Subtheme generation script.
 */

define('GENERATOR_TEMPLATE_FOLDER', 'material_base_subtheme');
define('GENERATOR_PLACEHOLDER', 'THEMENAME');

define('GENERATOR_DEFAULT_THEMENAME', 'material_top');
define('GENERATOR_DEFAULT_THEMES_PATH', '../../custom');

// TODO: handle environment variables

define('GENERATOR_THEMENAME', GENERATOR_DEFAULT_THEMENAME);
define('GENERATOR_THEMES_PATH', realpath(GENERATOR_DEFAULT_THEMES_PATH));

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

  // echo 'Handling arguments' . PHP_EOL;
  // echo 'args:' . PHP_EOL;
  // print_r($args);
  // echo 'args_count: ' . $args_count . PHP_EOL;

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
  echo '  generate.php [themename] [path to themes folder]' . PHP_EOL;
  exit(0);

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

  // echo 'Validating themename' . PHP_EOL;

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

  // echo 'Validating path' . PHP_EOL;

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

  // echo 'Generating subtheme' . PHP_EOL;
  // echo 'variables:' . PHP_EOL;
  // print_r($variables);

  if (isset($variables['themename'])) {
    $themename = $variables['themename'];
  } else {
    $themename = GENERATOR_THEMENAME;
  }

  if (isset($variables['path'])) {
    $path = $variables['path'];
  } else {
    $path = GENERATOR_THEMES_PATH;
  }

  // echo 'themename: ' . $themename . PHP_EOL;
  // echo 'path: ' . $path . PHP_EOL;

  $theme_path = $path . DIRECTORY_SEPARATOR . $themename;

  // Copy template folder to themes folder
  copy_template_folder($theme_path);

  // Rename files containing placeholder
  rename_template_files($theme_path, $themename);

  // Replace placeholders in files content
  replace_template_placeholders($theme_path, $themename);

  // Comment out hidden parameter in THEMENAME.info.yml
  unhide_theme($theme_path, $themename);

  exit(0);

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

  // echo 'Copying template folder' . PHP_EOL;
  // echo 'destination: ' . $destination . PHP_EOL;

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
 *  Result of executing.
 */
function copy_folder($source, $destination) {

  // Getting folder content
  if (!$folder = opendir($source)) {
    echo 'Can not open "' . $source . '".'. PHP_EOL;
    exit(1);
  }

  // Check for destination folder already exist
  if (is_dir($destination)) {
    echo 'Destination folder "' . $destination . '" already exists.' . PHP_EOL;
    exit(1);
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
 *  Result of executing.
 */
function rename_template_files($path, $themename) {

  // echo 'Renaming template files' . PHP_EOL;
  // echo 'path: ' . $path . PHP_EOL;
  // echo 'themename: ' . $themename . PHP_EOL;

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
        // echo 'path: ' . $path . PHP_EOL;
        // echo 'file: ' . $file . PHP_EOL;

        // Checking filename has placeholder
        if (strpos($file, GENERATOR_PLACEHOLDER) !== FALSE) {
          // Preparing new file path
          $new_file = $path . DIRECTORY_SEPARATOR . str_replace(GENERATOR_PLACEHOLDER, $themename, $file);

          // echo 'new_file: ' . $new_file . PHP_EOL;

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
 * Recursively replace template paceholders
 *
 * @param $path
 *  Path to theme folder.
 *
 * @param $themename
 *  Name of the theme.
 * 
 * @return
 *  Result of executing.
 */
function replace_template_placeholders($path, $themename) {

  // echo 'Replacing template paceholders' . PHP_EOL;
  // echo 'path: ' . $path . PHP_EOL;
  // echo 'themename: ' . $themename . PHP_EOL;

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

          // echo 'file: ' . $file . PHP_EOL;
          // echo 'replace: ' . $replace . PHP_EOL;
        }
      }

    }
  }

  closedir($folder);
  return TRUE;
  
}

/**
 * Comment out 'hidden: thue' in THEMENAME.info.yml
 *
 * @param $path
 *  Path to theme folder.
 *
 * @param $themename
 *  Name of the theme.
 * 
 * @return
 *  Result of executing.
 */
function unhide_theme($path, $themename) {

  // echo 'Unhiding the theme' . PHP_EOL;
  // echo 'path: ' . $path . PHP_EOL;
  // echo 'themename: ' . $themename . PHP_EOL;

  $info_file = $path . DIRECTORY_SEPARATOR . $themename . '.info.yml';

  $file_content = file_get_contents($info_file);
  $file_content = str_replace('hidden: true', '# hidden: true', $file_content);
  if (!file_put_contents($info_file, $file_content)) {
    echo 'Can not write to "' . $info_file . '".' . PHP_EOL;
    exit(1);
  }

  return TRUE;
  
}
