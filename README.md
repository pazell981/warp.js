warp.js
=======

--Synopsis--

A gallery or presentation layer that shows an image or whatever HTML you like as well further detail when you click on an item.  Items can also be navigated through using an the keyboard up and down arrows.

For an example see:

http://www.pazellmer.com/warp_js/

--Motivation--

Created this script to present the sites in my portfolio.  

--Installation--

Include jQuery script and script src tag for warp at the bottom of page.

To use this script create a html div container with an id of "warpContainer" that holds the items.  Each item should be be a div container with a "warp" class.  Additional information should be held in a div with a class of "warp_desc" with in the parent warp div.  

The structure should look like:

	<div id="warpContainer" data-xOffset="" data-yOffset="" data-shape="" data-continuous="" data-xSize="" data-ySize="">
		<div class="warp">
			<div class="warp_desc">
				...
			</div>
		</div>
	</div>

See index.php for an example of HTML structure.

A "data-xOffset" and/or "data-yOffset" can be included in the "warpContainer" tag to move objects vertically and/or horizontally to help with positioning the center.

A "data-shape" can be included in the "warpContainer" tag to change the formation.  Currently there are diamond, circle, triangle and column formation.  If none is chosen diamond will be the default.

A "data-continuous" can be set to TRUE to have continuous animation or set to FALSE to only animate upon interaction.

A "data-xSize" and/or "data-ySize" can be included to increase or decrease the size from the center.

--Contributors--

Author: Paul Zellmer

--License--

MIT licensed, Copyright (C) 2014 Paul Zellmer, http://pazellmer.com


