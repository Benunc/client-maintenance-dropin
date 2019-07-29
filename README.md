# Client Maintenance Drop-in
A drop-in plugin for putting a site into maintenance mode for every user except ME.

## Instructions
The user ID defaults to 1, so if you are not user ID of 1, and you drop this php file into the mu-plugins folder, you'll lock yourself out and need to remove the file.

To use this file, First, change the image to a URL of your choice (if you want), then change the "interesting link" variable to a full URL including anchor text to something appropriate for that client. Ensure also that the user ID is set to the correct one for you to have access.

Once that is done, drop the PHP file `client-maintenance.php` into your mu-plugins directory. 

When you are ready to take the site out of maintenance mode, comment out the `add_action( 'init', 'my_maintenance_mode' );` line from the file by placing two slashes `//` at the beginning of it.
