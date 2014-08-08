/**
 * @author		Ahmed Aboelsaoud Ahmed <ahmedsaoud31@gmail.com>
 * @copyright	© 2014
 * @license		GPL
 * @license		http://opensource.org/licenses/gpl-license.php
 * @link		https://github.com/ahmedsaoud31/HTML5QuranPlayer
 * @version		0.0.1
 **/
function in_array(myinput,myarray)
{
	for(i=0;i<myarray.length;i++)
	{
		if(myinput == myarray[i])
		{
			return true;		
		}
	}
	return false;
}
function in_index_array(myinput,myarray)
{
	for(var i in myarray)
	{
		if(myinput == i)
		{
			return true;		
		}
	}
	return false;
}

function end(myarray)
{
		return myarray[myarray.length-1];
}

function exploade(cutstr,mystr)
{
		return mystr.split(cutstr);
}

function strtolower(mystr)
{
		return mystr.toLowerCase();
}
// تم بحمد الله