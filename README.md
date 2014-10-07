warp.js
=======

--Synopsis--

A gallery/presentation layer that shows an image or whatever html you like as well further detail when you click on an item.  Items can also be navigated through using an the keyboard up and down arrows.

--Motivation--

Created this script to present the sites in my portfolio.  I plan on adding more formations than the diamond shape as well other options.

--Installation--

Include script src tag at the bottom of page.

To use this script create a html div container with an id of "warpContainer" that holds the items.  Each item should be be a div container with a "warp" class.  Additional information should be held in a div with a class of "warp_desc" with in the parent warp div.  

The structure should look like:

	<div id="warpContainer">
		<div class="warp">
			<div class="warp_desc">
				...
			</div>
		</div>
	</div>

See index.php for an example of html structure.

A "data-offset" can be included in the "warpContainer" tag to push down objects vertically to off set for toolbar or titles.

--Contributors--

Author: Paul Zellmer
contact: paul@pazellmer.com

--License--

MIT licensed, Copyright (C) 2014 Paul Zellmer, http://pazellmer.com


