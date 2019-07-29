# Client Maintenance Drop-in
A drop-in plugin for putting a site into maintenance mode for every user except ME.

## Instructions

To use this file: 

1. Change the user email to your user email.
2. Change the "interesting link" variable to a full URL including anchor text to something appropriate for that client.
3. (optional) Change the image to a URL of your choice (if you want), 

Once that is done, drop the PHP file `client-maintenance.php` into your mu-plugins directory. 

When you are ready to take the site out of maintenance mode, comment out the `add_action( 'init', 'my_maintenance_mode' );` line from the file by placing two slashes `//` at the beginning of it.
