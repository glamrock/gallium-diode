###Share photos without over-exposing yourself.

###Removing Photo Metadata
You've got options.

###[ExifTool](http://owl.phy.queensu.ca/~phil/exiftool/)
"exif" data is photo metadata. ExifTool is great for viewing and removing this extra information from your photos, and also works in Windows. For very sensitive photos, such as police malfeasance, please double-check the photos before uploading or sharing.

###[ExifCleaner](http://www.superutils.com/products/exifcleaner/)
I hear great things about this program, but haven't tried it. It works on Windows only.

###ImageMagick
Like exiftool, ImageMagick quickly removes metadata from images.  It is most useful when using a command line in Linux.

To remove the exif/meta data from a folder of images, copy this command into your terminal:
`find ./images -name '*.jpg' |xargs mogrify -strip` 

* Make sure you have a backup of your original images at all times!
* Replace "images" with the name of your folder.
* Use .png, .jpeg, or .raw instead of .jpg as needed.
* This will also remove time and date, so make sure that's what you want.

If using an automated WordPress plugin, you will need to have ImageMagick installed and running on your server before activating that plugin.

###Legal stuff
In the US, [it's legal to film the police.](http://images.politico.com/global/2013/03/08/garcia_doj_soi_03-04-13.html) Laws vary greatly.

##Running a website
*note: this is best deployed as a Tor hidden service, unless you're prepared to defend against legal attacks*

###For yourself only
On your server, make a folder for your gallery and upload the contents of `gallery`.  After removing the metadata (it's for the best, really), upload your files to data. You can have several galleries with just one script, so your site structure may begin to look like this:

````
website.net/gallery/index.php
website.net/gallery/data/catfolder/
website.net/gallery/data/copfolder/
````

**Do not upload photos of police malfeasance to Flickr or Imgur. They will not protect you!**

The script in `/gallery` is called "FuckFlickr" and was made available courtesy of the [F.A.T. Lab](http://fffff.at/fuckflickr-info)

###For your friends and invited people
*note: this is best deployed as a Tor hidden service, unless you're prepared to defend against legal attacks*

**For ease of maintenance and image management, I recommend using [WordPress](https://wordpress.org) with multiuser enabled.**  There are security problems with every content management system, but WordPress is more of a target for exploits due to its large userbase.  Do not include personally-identifiable information in your setup if you want to remain anonymous.  Once you have WordPress set up and working, move on to the next steps.

**Set images to remove metadata on upload**
* Install ImageMagick on your server
* There are a few metadata-removal plugins out there, including "[Resize Image After Upload](http://wordpress.org/plugins/resize-image-after-upload/)" and "[SEO image renamer](http://wordpress.org/plugins/seo-image-renamer/)".  The former works very well for removing metadata, while the latter is good if you want all of the information to be replaced with something specific (such as the event, date or location).
* Pick one and upload their folder to `wp-content/plugins`, then go to Plugins in your administrative site and click activate.

**Invites**
* You can set invite codes using the ["Secure Invites" plugin](http://wordpress.org/plugins/wordpress-mu-secure-invites/). Upload the folder to `wp-content/plugins`, but don't activate it until your other settings are the way you'd like them to be.  If you get an error while changing settings later, deactivate the plugin and try again.


####License
These instructions and scripts are licensed under the BSD 2-clause license. This means you can give these scripts to other people to use for free. You can also use them for free.  But if you put them on your website, you have to include the license and provide everything free of charge.

If you enjoyed these and want to contribute, feel free to fork this repo on github or email contributions to griffin [at] cryptolab.net

*Do something awesome.*
