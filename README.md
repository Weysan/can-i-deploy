# Can I Deploy
A ReactJS checklist to deploy your Wordpress or Drupal app

This little app is a Checklist to be sure you can deploy a Wordpress or a Drupal website to your preproduction or production server.

## Add new questions
To add new questions to the checklist you need to modify `checklists/preprod_wp.php` for Wordpress in preproduction server.

Files nomenclature are :
**environment server**_**CMS class**

- For Wordpress, the CMS class is *wp*
- For Drupal, the CMS class is *drupal*

Each element has a question ("question" key) and a help (displayed if we had selected *No* - "aide" key).

## Website
Check: www.can-i-deploy.io
