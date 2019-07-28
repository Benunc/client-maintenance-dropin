# Client Maintenance Drop-in
A drop-in plugin for putting a site into maintenance mode for every user except ME.

## Instructions
The user ID defaults to 1, so if you are not user ID of 1, and you drop this php file into the mu-plugins folder, you'll lock yourself out and need to remove the file.

To use this file, drop the PHP file `client-maintenance.php` into your mu-plugins directory. 

When you are ready to take the site out of maintenance mode, comment out the `add_action( 'init', 'my_maintenance_mode' );` line from the file by placing two slashes `//` at the beginning of it.
