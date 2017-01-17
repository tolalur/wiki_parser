<?php
// vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4:
/**
 * Specialchar rule end renderer for Plain
 *
 * PHP versions 4 and 5
 *
 * @category   Text
 * @package    Text_Wiki
 * @author     Bertrand Gugger <bertrand@toggg.com>
 * @copyright  2005 bertrand Gugger
 * @license    http://www.gnu.org/copyleft/lesser.html  LGPL License 2.1
 * @version    CVS: $Id$
 * @link       http://pear.php.net/package/Text_Wiki
 */

/**
 * This class renders special characters in Plain.
 *
 * @category   Text
 * @package    Text_Wiki
 * @author     Bertrand Gugger <bertrand@toggg.com>
 * @copyright  2005 bertrand Gugger
 * @license    http://www.gnu.org/copyleft/lesser.html  LGPL License 2.1
 * @version    Release: @package_version@
 * @link       http://pear.php.net/package/Text_Wiki
 */
class Text_Wiki_Render_Plain_Specialchar extends Text_Wiki_Render
{
    public $types = array('~bs~' => '\\',
                       '~hs~' => ' ',
                       '~amp~' => '&',
                       '~ldq~' => '"',
                       '~rdq~' => '"',
                       '~lsq~' => "'",
                       '~rsq~' => "'",
                       '~c~' => '©',
                       '~--~' => '-',
                       '" -- "' => '-',
                       '&quot; -- &quot;' => '-',
                       '~lt~' => '<',
                       '~gt~' => '>');

    public function token($options)
    {
        if (isset($this->types[$options['char']])) {
            return $this->types[$options['char']];
        } else {
            return $options['char'];
        }
    }
}
