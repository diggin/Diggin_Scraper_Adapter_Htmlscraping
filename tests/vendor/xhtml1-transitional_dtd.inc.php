<?php
return array(
	'html' => array(
		'type' => 'unique',
		'children' => array('head', 'body'),
		'attributes' => array('lang', 'xml:lang', 'dir', 'id', 'xmlns'),
		'default_child' => 'body',
	),
	'head' => array(
		'type' => 'unique',
		'children' => array('script', 'style', 'meta', 'link', 'object', 'isindex', 'title', 'base'),
		'attributes' => array('lang', 'xml:lang', 'dir', 'id', 'profile'),
		'default_parent' => 'html',
	),
	'title' => array(
		'children' => array('#PCDATA'),
		'attributes' => array('lang', 'xml:lang', 'dir', 'id'),
		'default_parent' => 'head',
	),
	'base' => array(
		'children' => array(),
		'attributes' => array('id', 'href', 'target'),
		'default_parent' => 'head',
	),
	'meta' => array(
		'children' => array(),
		'attributes' => array('lang', 'xml:lang', 'dir', 'id', 'http-equiv', 'name', 'content', 'scheme'),
		'default_parent' => 'head',
	),
	'link' => array(
		'children' => array(),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'charset', 'href', 'hreflang', 'type', 'rel', 'rev', 'media', 'target'),
		'default_parent' => 'head',
	),
	'style' => array(
		'children' => array('#PCDATA'),
		'attributes' => array('lang', 'xml:lang', 'dir', 'id', 'type', 'media', 'title', 'xml:space'),
		'default_parent' => 'head',
	),
	'script' => array(
		'type' => 'inline',
		'children' => array('#PCDATA'),
		'attributes' => array('id', 'charset', 'type', 'language', 'src', 'defer', 'xml:space'),
		'default_parent' => 'head',
	),
	'noscript' => array(
		'type' => 'block',
		'children' => array('#PCDATA', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'ol', 'dl', 'menu', 'dir', 'pre', 'hr', 'blockquote', 'address', 'center', 'noframes', 'isindex', 'fieldset', 'table', 'form', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'noscript', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'iframe' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'ol', 'dl', 'menu', 'dir', 'pre', 'hr', 'blockquote', 'address', 'center', 'noframes', 'isindex', 'fieldset', 'table', 'form', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'noscript', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'longdesc', 'name', 'src', 'frameborder', 'marginwidth', 'marginheight', 'scrolling', 'align', 'height', 'width'),
	),
	'noframes' => array(
		'type' => 'block',
		'children' => array('#PCDATA', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'ol', 'dl', 'menu', 'dir', 'pre', 'hr', 'blockquote', 'address', 'center', 'noframes', 'isindex', 'fieldset', 'table', 'form', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'noscript', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'body' => array(
		'type' => 'unique',
		'children' => array('#PCDATA', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'ol', 'dl', 'menu', 'dir', 'pre', 'hr', 'blockquote', 'address', 'center', 'noframes', 'isindex', 'fieldset', 'table', 'form', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'noscript', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'onload', 'onunload', 'background', 'bgcolor', 'text', 'link', 'vlink', 'alink'),
		'default_parent' => 'html',
	),
	'div' => array(
		'type' => 'block',
		'children' => array('#PCDATA', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'ol', 'dl', 'menu', 'dir', 'pre', 'hr', 'blockquote', 'address', 'center', 'noframes', 'isindex', 'fieldset', 'table', 'form', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'noscript', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'align'),
	),
	'p' => array(
		'type' => 'block',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'align'),
	),
	'h1' => array(
		'type' => 'block',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'align'),
	),
	'h2' => array(
		'type' => 'block',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'align'),
	),
	'h3' => array(
		'type' => 'block',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'align'),
	),
	'h4' => array(
		'type' => 'block',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'align'),
	),
	'h5' => array(
		'type' => 'block',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'align'),
	),
	'h6' => array(
		'type' => 'block',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'align'),
	),
	'ul' => array(
		'type' => 'block',
		'children' => array('li'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'type', 'compact'),
		'default_child' => 'li',
	),
	'ol' => array(
		'type' => 'block',
		'children' => array('li'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'type', 'compact', 'start'),
		'default_child' => 'li',
	),
	'menu' => array(
		'type' => 'block',
		'children' => array('li'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'compact'),
		'default_child' => 'li',
	),
	'dir' => array(
		'type' => 'block',
		'children' => array('li'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'compact'),
		'default_child' => 'li',
	),
	'li' => array(
		'children' => array('#PCDATA', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'ol', 'dl', 'menu', 'dir', 'pre', 'hr', 'blockquote', 'address', 'center', 'noframes', 'isindex', 'fieldset', 'table', 'form', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'noscript', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'type', 'value'),
		'default_parent' => 'ul',
	),
	'dl' => array(
		'type' => 'block',
		'children' => array('dt', 'dd'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'compact'),
		'default_child' => 'dt',
	),
	'dt' => array(
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
		'default_parent' => 'dl',
	),
	'dd' => array(
		'children' => array('#PCDATA', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'ol', 'dl', 'menu', 'dir', 'pre', 'hr', 'blockquote', 'address', 'center', 'noframes', 'isindex', 'fieldset', 'table', 'form', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'noscript', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
		'default_parent' => 'dl',
	),
	'address' => array(
		'type' => 'block',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script', 'p'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'hr' => array(
		'type' => 'block',
		'children' => array(),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'align', 'noshade', 'size', 'width'),
	),
	'pre' => array(
		'type' => 'block',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'tt', 'i', 'b', 'u', 's', 'strike', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'width', 'xml:space'),
	),
	'blockquote' => array(
		'type' => 'block',
		'children' => array('#PCDATA', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'ol', 'dl', 'menu', 'dir', 'pre', 'hr', 'blockquote', 'address', 'center', 'noframes', 'isindex', 'fieldset', 'table', 'form', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'noscript', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'cite'),
	),
	'center' => array(
		'type' => 'block',
		'children' => array('#PCDATA', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'ol', 'dl', 'menu', 'dir', 'pre', 'hr', 'blockquote', 'address', 'center', 'noframes', 'isindex', 'fieldset', 'table', 'form', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'noscript', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'ins' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'ol', 'dl', 'menu', 'dir', 'pre', 'hr', 'blockquote', 'address', 'center', 'noframes', 'isindex', 'fieldset', 'table', 'form', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'noscript', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'cite', 'datetime'),
	),
	'del' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'ol', 'dl', 'menu', 'dir', 'pre', 'hr', 'blockquote', 'address', 'center', 'noframes', 'isindex', 'fieldset', 'table', 'form', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'noscript', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'cite', 'datetime'),
	),
	'a' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'accesskey', 'tabindex', 'onfocus', 'onblur', 'charset', 'type', 'name', 'href', 'hreflang', 'rel', 'rev', 'shape', 'coords', 'target'),
		'required_attribute' => 'href'
	),
	'span' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'bdo' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'lang', 'xml:lang', 'dir'),
	),
	'br' => array(
		'type' => 'inline',
		'children' => array(),
		'attributes' => array('id', 'class', 'style', 'title', 'clear'),
	),
	'em' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'strong' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'dfn' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'code' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'samp' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'kbd' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'var' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'cite' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'abbr' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'acronym' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'q' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'cite'),
	),
	'sub' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'sup' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'tt' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'i' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'b' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'big' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'small' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'u' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	's' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'strike' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'basefont' => array(
		'type' => 'inline',
		'children' => array(),
		'attributes' => array('id', 'size', 'color', 'face'),
	),
	'font' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'size', 'color', 'face'),
	),
	'object' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'param', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'ol', 'dl', 'menu', 'dir', 'pre', 'hr', 'blockquote', 'address', 'center', 'noframes', 'isindex', 'fieldset', 'table', 'form', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'noscript', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'declare', 'classid', 'codebase', 'data', 'type', 'codetype', 'archive', 'standby', 'height', 'width', 'usemap', 'name', 'tabindex', 'align', 'border', 'hspace', 'vspace'),
	),
	'param' => array(
		'children' => array(),
		'attributes' => array('id', 'name', 'value', 'valuetype', 'type'),
	),
	'applet' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'param', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'ol', 'dl', 'menu', 'dir', 'pre', 'hr', 'blockquote', 'address', 'center', 'noframes', 'isindex', 'fieldset', 'table', 'form', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'noscript', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'codebase', 'archive', 'code', 'object', 'alt', 'name', 'width', 'height', 'align', 'hspace', 'vspace'),
	),
	'img' => array(
		'type' => 'inline',
		'children' => array(),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'src', 'alt', 'name', 'longdesc', 'height', 'width', 'usemap', 'ismap', 'align', 'border', 'hspace', 'vspace'),
		'required_attribute' => 'src'
	),
	'map' => array(
		'type' => 'inline',
		'children' => array('p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'ol', 'dl', 'menu', 'dir', 'pre', 'hr', 'blockquote', 'address', 'center', 'noframes', 'isindex', 'fieldset', 'table', 'form', 'noscript', 'ins', 'del', 'script', 'area'),
		'attributes' => array('lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'id', 'class', 'style', 'title', 'name'),
	),
	'area' => array(
		'children' => array(),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'accesskey', 'tabindex', 'onfocus', 'onblur', 'shape', 'coords', 'href', 'nohref', 'alt', 'target'),
		'default_parent' => 'map',
		'required_attribute' => 'href'
	),
	'form' => array(
		'type' => 'block',
		'children' => array('#PCDATA', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'ol', 'dl', 'menu', 'dir', 'pre', 'hr', 'blockquote', 'address', 'center', 'noframes', 'isindex', 'fieldset', 'table', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'noscript', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'action', 'method', 'name', 'enctype', 'onsubmit', 'onreset', 'accept', 'accept-charset', 'target'),
	),
	'label' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'for', 'accesskey', 'onfocus', 'onblur'),
	),
	'input' => array(
		'type' => 'inline',
		'children' => array(),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'accesskey', 'tabindex', 'onfocus', 'onblur', 'type', 'name', 'value', 'checked', 'disabled', 'readonly', 'size', 'maxlength', 'src', 'alt', 'usemap', 'onselect', 'onchange', 'accept', 'align'),
	),
	'select' => array(
		'type' => 'inline',
		'children' => array('optgroup', 'option'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'name', 'size', 'multiple', 'disabled', 'tabindex', 'onfocus', 'onblur', 'onchange'),
		'ignore_invalid_children' => TRUE,
		'default_child' => 'option',
	),
	'optgroup' => array(
		'children' => array('option'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'disabled', 'label'),
		'ignore_invalid_children' => TRUE,
		'default_child' => 'option',
	),
	'option' => array(
		'children' => array('#PCDATA'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'selected', 'disabled', 'label', 'value'),
		'ignore_invalid_children' => TRUE,
		'default_parent' => 'select',
	),
	'textarea' => array(
		'type' => 'inline',
		'children' => array('#PCDATA'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'accesskey', 'tabindex', 'onfocus', 'onblur', 'name', 'rows', 'cols', 'disabled', 'readonly', 'onselect', 'onchange'),
	),
	'fieldset' => array(
		'type' => 'block',
		'children' => array('#PCDATA', 'legend', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'ol', 'dl', 'menu', 'dir', 'pre', 'hr', 'blockquote', 'address', 'center', 'noframes', 'isindex', 'fieldset', 'table', 'form', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'noscript', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup'),
	),
	'legend' => array(
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'accesskey', 'align'),
	),
	'button' => array(
		'type' => 'inline',
		'children' => array('#PCDATA', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'ol', 'dl', 'menu', 'dir', 'pre', 'hr', 'blockquote', 'address', 'center', 'noframes', 'table', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'noscript', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'accesskey', 'tabindex', 'onfocus', 'onblur', 'name', 'value', 'type', 'disabled'),
	),
	'isindex' => array(
		'type' => 'block',
		'children' => array(),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'prompt'),
	),
	'table' => array(
		'type' => 'block',
		'children' => array('caption', 'col', 'colgroup', 'thead', 'tfoot', 'tbody', 'tr'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'summary', 'width', 'border', 'frame', 'rules', 'cellspacing', 'cellpadding', 'align', 'bgcolor'),
		'default_child' => 'tr',
	),
	'caption' => array(
		'children' => array('#PCDATA', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'align'),
	),
	'thead' => array(
		'children' => array('tr'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'align', 'char', 'charoff', 'valign'),
		'default_parent' => 'table',
		'default_child' => 'tr',
	),
	'tfoot' => array(
		'children' => array('tr'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'align', 'char', 'charoff', 'valign'),
		'default_parent' => 'table',
		'default_child' => 'tr',
	),
	'tbody' => array(
		'children' => array('tr'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'align', 'char', 'charoff', 'valign'),
		'default_parent' => 'table',
		'default_child' => 'tr',
	),
	'colgroup' => array(
		'children' => array('col'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'span', 'width', 'align', 'char', 'charoff', 'valign'),
		'default_parent' => 'table',
		'default_child' => 'col',
	),
	'col' => array(
		'children' => array(),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'span', 'width', 'align', 'char', 'charoff', 'valign'),
		'default_parent' => 'colgroup',
	),
	'tr' => array(
		'children' => array('th', 'td'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'align', 'char', 'charoff', 'valign', 'bgcolor'),
		'default_parent' => 'table',
		'default_child' => 'td',
	),
	'th' => array(
		'children' => array('#PCDATA', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'ol', 'dl', 'menu', 'dir', 'pre', 'hr', 'blockquote', 'address', 'center', 'noframes', 'isindex', 'fieldset', 'table', 'form', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'noscript', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'abbr', 'axis', 'headers', 'scope', 'rowspan', 'colspan', 'align', 'char', 'charoff', 'valign', 'nowrap', 'bgcolor', 'width', 'height'),
		'default_parent' => 'tr',
	),
	'td' => array(
		'children' => array('#PCDATA', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'ol', 'dl', 'menu', 'dir', 'pre', 'hr', 'blockquote', 'address', 'center', 'noframes', 'isindex', 'fieldset', 'table', 'form', 'a', 'br', 'span', 'bdo', 'object', 'applet', 'img', 'map', 'iframe', 'tt', 'i', 'b', 'u', 's', 'strike', 'big', 'small', 'font', 'basefont', 'em', 'strong', 'dfn', 'code', 'q', 'samp', 'kbd', 'var', 'cite', 'abbr', 'acronym', 'sub', 'sup', 'input', 'select', 'textarea', 'label', 'button', 'noscript', 'ins', 'del', 'script'),
		'attributes' => array('id', 'class', 'style', 'title', 'lang', 'xml:lang', 'dir', 'onclick', 'ondblclick', 'onmousedown', 'onmouseup', 'onmouseover', 'onmousemove', 'onmouseout', 'onkeypress', 'onkeydown', 'onkeyup', 'abbr', 'axis', 'headers', 'scope', 'rowspan', 'colspan', 'align', 'char', 'charoff', 'valign', 'nowrap', 'bgcolor', 'width', 'height'),
		'default_parent' => 'tr',
	),
);
?>
