/**
 * Communications between Moodle and znanja via cross-domain messaging.
 *
 * Supported message format (in JSON):
 *
 * {
 *     "name": STRING,
 *         Course name.
 *
 *     "description": STRING,
 *         Course description.
 *
 *     "url": STRING
 *         URL to obtain SCORM package.
 * }
 *
 * @package  mod_znanja
 * @author   znanja, inc.  {@link https://znanja.com}
 * @license  See LICENSE.txt
 */

window.addEventListener('message', function(event)
{
	var data = JSON.parse(event.data);

	document.getElementById('id_name').value = data.name;
	document.getElementsByName('packageurl')[0].value = data.url;

	// Replace description WYSIWYG contents
	var descDoc =
		document.getElementById('id_introeditor_ifr').contentDocument;

	while (descDoc.body.children.length)
	{
		descDoc.body.removeChild(descDoc.body.children[0]);
	}

	var paragraph = descDoc.createElement('p');
	paragraph.textContent = data.description;
	descDoc.body.appendChild(paragraph);

	// Text description needs to be replaced as well, otherwise a "Required"
	// message will show
	document.getElementById('id_introeditor').value =
		'<p>' + data.description + '</p>';
});
