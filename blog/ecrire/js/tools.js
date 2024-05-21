/* ***** BEGIN LICENSE BLOCK *****
 * This file is part of DotClear.
 * Copyright (c) 2004 Olivier Meunier and contributors. All rights
 * reserved.
 *
 * DotClear is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * DotClear is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with DotClear; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * ***** END LICENSE BLOCK ***** */

/*img = new Image;
img.src = 'images/moins.png';*/

function openClose(id,mode)
{
	if(document.getElementById) {
		element = document.getElementById(id);
		img = document.getElementById('img_' + id);
	} else if(document.all) {
		element = document.all[id];
		img = document.all['img_' + id];
	} else return;
	
	if(element.style) {
		if(mode == 0) {
			if(element.style.display == 'block' ) {
				element.style.display = 'none';
				img.src = 'images/plus.png';
			} else {
				element.style.display = 'block';
				img.src = 'images/moins.png';
			}
		} else if(mode == 1) {
			element.style.display = 'block';
			img.src = 'images/moins.png';
		} else if(mode == -1) {
			element.style.display = 'none';
			img.src = 'images/plus.png';
		}
	}
}

function mOpenClose(idArray,mode)
{
	for(var i=0;i<idArray.length;i++) {
		openClose(idArray[i],mode);
	}
}

function showHide(id,mode)
{
	if(document.getElementById) {
		element = document.getElementById(id);
	} else if(document.all) {
		element = document.all[id];
	} else return;
	
	if(element.style) {
		if(mode) {
			element.style.display = 'block';
		} else {
			element.style.display = 'none';
		}
	}
}

function popup(url)
{
	window.open(url,'dc_popup',
	'alwaysRaised=yes,toolbar=no,height=420,width=500,menubar=no,resizable=yes,scrollbars=yes,status=no');
}

function limitArea(e,limit)
{
	if (e.value.length > limit) {
		e.value = e.value.substring(0,limit);
	}
}