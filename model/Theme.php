<?php
/**
 * This file is part of OpenClinic
 *
 * Copyright (c) 2002-2004 jact
 * Licensed under the GNU GPL. For full terms see the file LICENSE.
 *
 * $Id: Theme.php,v 1.1 2004/02/28 15:49:54 jact Exp $
 */

/**
 * Theme.php
 ********************************************************************
 * Contains the class Theme
 ********************************************************************
 * Author: jact <jachavar@terra.es>
 * Last modified: 28/02/04 16:49
 */

define("THEME_TITLE_FONT_SIZE", 14);
define("THEME_BODY_FONT_SIZE", 10);
define("THEME_NAVBAR_FONT_SIZE", 10);
define("THEME_TAB_FONT_SIZE", 12);
define("THEME_TABLE_BORDER_WIDTH", 1);
define("THEME_TABLE_CELL_PADDING", 1);

/*
 * Theme represents a look and feel theme.
 ********************************************************************
 * @author jact <jachavar@terra.es>
 * @version 0.6
 * @access public
 ********************************************************************
 * Methods:
 *  bool _isCorrectColor(string $color)
 *  bool validateData(void)
 */
class Theme
{
  var $_idTheme = 0;
  var $_themeName = "";
  var $_themeNameError = "";

  var $_titleBgColor = "";
  var $_titleBgColorError = "";
  var $_titleFontFamily = "";
  var $_titleFontFamilyError = "";
  var $_titleFontSize = THEME_TITLE_FONT_SIZE;
  var $_titleFontSizeError = "";
  var $_titleFontBold = false;
  var $_titleFontColor = "";
  var $_titleFontColorError = "";
  var $_titleAlign = "left";

  var $_bodyBgColor = "";
  var $_bodyBgColorError = "";
  var $_bodyFontFamily = "";
  var $_bodyFontFamilyError = "";
  var $_bodyFontSize = THEME_BODY_FONT_SIZE;
  var $_bodyFontSizeError = "";
  var $_bodyFontColor = "";
  var $_bodyFontColorError = "";
  var $_bodyLinkColor = "";
  var $_bodyLinkColorError = "";

  var $_errorColor = "";
  var $_errorColorError = "";

  var $_navbarBgColor = "";
  var $_navbarBgColorError = "";
  var $_navbarFontFamily = "";
  var $_navbarFontFamilyError = "";
  var $_navbarFontSize = THEME_NAVBAR_FONT_SIZE;
  var $_navbarFontSizeError = "";
  var $_navbarFontColor = "";
  var $_navbarFontColorError = "";
  var $_navbarLinkColor = "";
  var $_navbarLinkColorError = "";

  var $_tabBgColor = "";
  var $_tabBgColorError = "";
  var $_tabFontFamily = "";
  var $_tabFontFamilyError = "";
  var $_tabFontSize = THEME_TAB_FONT_SIZE;
  var $_tabFontSizeError = "";
  var $_tabFontBold = false;
  var $_tabFontColor = "";
  var $_tabFontColorError = "";
  var $_tabLinkColor = "";
  var $_tabLinkColorError = "";

  var $_tableBorderColor = "";
  var $_tableBorderColorError = "";
  var $_tableBorderWidth = THEME_TABLE_BORDER_WIDTH;
  var $_tableBorderWidthError = "";
  var $_tableCellPadding = THEME_TABLE_CELL_PADDING;
  var $_tableCellPaddingError = "";

  var $_count = 0;

  var $_trans; // to translate htmlspecialchars()

  function Theme()
  {
    $this->_trans = array_flip(get_html_translation_table(HTML_SPECIALCHARS));
  }

  /**
   * bool _isCorrectColor(string $color)
   ********************************************************************
   * Verify if a hex color is correct
   ********************************************************************
   * @param string $color
   * @return bool false if is not a correct hex color, true otherwise
   * @access private
   */
  function _isCorrectColor($color)
  {
    if (eregi("^[a-z]*$", $color))
    {
      return true; // is a name color
    }

    return (eregi("^#[0-9a-f]{3}$", $color) || eregi("^#[0-9a-f]{6}$", $color));
  }

  /*
   * bool validateData(void)
   ********************************************************************
   * @return boolean true if data is valid, otherwise false.
   * @access public
   */
  function validateData()
  {
    $valid = true;

    // required field edits
    if ($this->_themeName == "")
    {
      $valid = false;
      $this->_themeNameError = _("This is a required field.");
    }

    if ($this->_titleBgColor == "")
    {
      $valid = false;
      $this->_titleBgColorError = _("This is a required field.");
    }
    elseif ( !$this->_isCorrectColor($this->_titleBgColor) )
    {
      $valid = false;
      $this->_titleBgColorError = _("This field is not correct.");
    }

    if ($this->_titleFontFamily == "")
    {
      $valid = false;
      $this->_titleFontFamilyError = _("This is a required field.");
    }

    if ($this->_titleFontColor == "")
    {
      $valid = false;
      $this->_titleFontColorError = _("This is a required field.");
    }
    elseif ( !$this->_isCorrectColor($this->_titleFontColor) )
    {
      $valid = false;
      $this->_titleFontColorError = _("This field is not correct.");
    }

    if ($this->_bodyBgColor == "")
    {
      $valid = false;
      $this->_bodyBgColorError = _("This is a required field.");
    }
    elseif ( !$this->_isCorrectColor($this->_bodyBgColor) )
    {
      $valid = false;
      $this->_bodyBgColorError = _("This field is not correct.");
    }

    if ($this->_bodyFontFamily == "")
    {
      $valid = false;
      $this->_bodyFontFamilyError = _("This is a required field.");
    }

    if ($this->_bodyFontColor == "")
    {
      $valid = false;
      $this->_bodyFontColorError = _("This is a required field.");
    }
    elseif ( !$this->_isCorrectColor($this->_bodyFontColor) )
    {
      $valid = false;
      $this->_bodyFontColorError = _("This field is not correct.");
    }

    if ($this->_bodyLinkColor == "")
    {
      $valid = false;
      $this->_bodyLinkColorError = _("This is a required field.");
    }
    elseif ( !$this->_isCorrectColor($this->_bodyLinkColor) )
    {
      $valid = false;
      $this->_bodyLinkColorError = _("This field is not correct.");
    }

    if ($this->_errorColor == "")
    {
      $valid = false;
      $this->_errorColorError = _("This is a required field.");
    }
    elseif ( !$this->_isCorrectColor($this->_errorColor) )
    {
      $valid = false;
      $this->_errorColorError = _("This field is not correct.");
    }

    if ($this->_navbarBgColor == "")
    {
      $valid = false;
      $this->_navbarBgColorError = _("This is a required field.");
    }
    elseif ( !$this->_isCorrectColor($this->_navbarBgColor) )
    {
      $valid = false;
      $this->_navbarBgColorError = _("This field is not correct.");
    }

    if ($this->_navbarFontFamily == "")
    {
      $valid = false;
      $this->_navbarFontFamilyError = _("This is a required field.");
    }

    if ($this->_navbarFontColor == "")
    {
      $valid = false;
      $this->_navbarFontColorError = _("This is a required field.");
    }
    elseif ( !$this->_isCorrectColor($this->_navbarFontColor) )
    {
      $valid = false;
      $this->_navbarFontColorError = _("This field is not correct.");
    }

    if ($this->_navbarLinkColor == "")
    {
      $valid = false;
      $this->_navbarLinkColorError = _("This is a required field.");
    }
    elseif ( !$this->_isCorrectColor($this->_navbarLinkColor) )
    {
      $valid = false;
      $this->_navbarLinkColorError = _("This field is not correct.");
    }

    if ($this->_tabBgColor == "")
    {
      $valid = false;
      $this->_tabBgColorError = _("This is a required field.");
    }
    elseif ( !$this->_isCorrectColor($this->_tabBgColor) )
    {
      $valid = false;
      $this->_tabBgColorError = _("This field is not correct.");
    }

    if ($this->_tabFontFamily == "")
    {
      $valid = false;
      $this->_tabFontFamilyError = _("This is a required field.");
    }

    if ($this->_tabFontColor == "")
    {
      $valid = false;
      $this->_tabFontColorError = _("This is a required field.");
    }
    elseif ( !$this->_isCorrectColor($this->_tabFontColor) )
    {
      $valid = false;
      $this->_tabFontColorError = _("This field is not correct.");
    }

    if ($this->_tabLinkColor == "")
    {
      $valid = false;
      $this->_tabLinkColorError = _("This is a required field.");
    }
    elseif ( !$this->_isCorrectColor($this->_tabLinkColor) )
    {
      $valid = false;
      $this->_tabLinkColorError = _("This field is not correct.");
    }

    if ($this->_tableBorderColor == "")
    {
      $valid = false;
      $this->_tableBorderColorError = _("This is a required field.");
    }
    elseif ( !$this->_isCorrectColor($this->_tableBorderColor) )
    {
      $valid = false;
      $this->_tableBorderColorError = _("This field is not correct.");
    }

    // numeric checks
    if ( !is_numeric($this->_titleFontSize) )
    {
      $valid = false;
      $this->_titleFontSizeError = _("This field must be numeric.");
    }
    elseif (strrpos($this->_titleFontSize, "."))
    {
      $valid = false;
      $this->_titleFontSizeError = _("This field must not contain a decimal point.");
    }
    elseif ($this->_titleFontSize <= 0)
    {
      $valid = false;
      $this->_titleFontSizeError = _("This field must be greater than zero.");
    }

    if ( !is_numeric($this->_bodyFontSize) )
    {
      $valid = false;
      $this->_bodyFontSizeError = _("This field must be numeric.");
    }
    elseif (strrpos($this->_bodyFontSize, "."))
    {
      $valid = false;
      $this->_bodyFontSizeError = _("This field must not contain a decimal point.");
    }
    elseif ($this->_bodyFontSize <= 0)
    {
      $valid = false;
      $this->_bodyFontSizeError = _("This field must be greater than zero.");
    }

    if ( !is_numeric($this->_navbarFontSize) )
    {
      $valid = false;
      $this->_navbarFontSizeError = _("This field must be numeric.");
    }
    elseif (strrpos($this->_navbarFontSize, "."))
    {
      $valid = false;
      $this->_navbarFontSizeError = _("This field must not contain a decimal point.");
    }
    elseif ($this->_navbarFontSize <= 0)
    {
      $valid = false;
      $this->_navbarFontSizeError = _("This field must be greater than zero.");
    }

    if ( !is_numeric($this->_tabFontSize) )
    {
      $valid = false;
      $this->_tabFontSizeError = _("This field must be numeric.");
    }
    elseif (strrpos($this->_tabFontSize, "."))
    {
      $valid = false;
      $this->_tabFontSizeError = _("This field must not contain a decimal point.");
    }
    elseif ($this->_tabFontSize <= 0)
    {
      $valid = false;
      $this->_tabFontSizeError = _("This field must be greater than zero.");
    }

    if ( !is_numeric($this->_tableBorderWidth) )
    {
      $valid = false;
      $this->_tableBorderWidthError = _("This field must be numeric.");
    }
    elseif (strrpos($this->_tableBorderWidth, "."))
    {
      $valid = false;
      $this->_tableBorderWidthError = _("This field must not contain a decimal point.");
    }
    elseif ($this->_tableBorderWidth <= 0)
    {
      $valid = false;
      $this->_tableBorderWidthError = _("This field must be greater than zero.");
    }

    if ( !is_numeric($this->_tableCellPadding) )
    {
      $valid = false;
      $this->_tablePaddingCellError = _("This field must be numeric.");
    }
    elseif (strrpos($this->_tableCellPadding, "."))
    {
      $valid = false;
      $this->_tableCellPaddingError = _("This field must not contain a decimal point.");
    }
    elseif ($this->_tableCellPadding <= 0)
    {
      $valid = false;
      $this->_tableCellPaddingError = _("This field must be greater than zero.");
    }

    return $valid;
  }

  /**
   ********************************************************************
   * getter methods for all fields
   ********************************************************************
   * @return string
   * @access public
   */
  function getIdTheme()
  {
    return intval($this->_idTheme);
  }

  function getThemeName()
  {
    return stripslashes(strtr($this->_themeName, $this->_trans));
  }

  function getTitleBgColor()
  {
    return stripslashes(strtr($this->_titleBgColor, $this->_trans));
  }

  function getTitleFontFamily()
  {
    return stripslashes(strtr($this->_titleFontFamily, $this->_trans));
  }

  function getTitleFontSize()
  {
    return intval($this->_titleFontSize);
  }

  function isTitleFontBold()
  {
    return ($this->_titleFontBold == true);
  }

  function getTitleFontColor()
  {
    return stripslashes(strtr($this->_titleFontColor, $this->_trans));
  }

  function getTitleAlign()
  {
    return stripslashes(strtr($this->_titleAlign, $this->_trans));
  }

  function getBodyBgColor()
  {
    return stripslashes(strtr($this->_bodyBgColor, $this->_trans));
  }

  function getBodyFontFamily()
  {
    return stripslashes(strtr($this->_bodyFontFamily, $this->_trans));
  }

  function getBodyFontSize()
  {
    return intval($this->_bodyFontSize);
  }

  function getBodyFontColor()
  {
    return stripslashes(strtr($this->_bodyFontColor, $this->_trans));
  }

  function getBodyLinkColor()
  {
    return stripslashes(strtr($this->_bodyLinkColor, $this->_trans));
  }

  function getErrorColor()
  {
    return stripslashes(strtr($this->_errorColor, $this->_trans));
  }

  function getNavbarBgColor()
  {
    return stripslashes(strtr($this->_navbarBgColor, $this->_trans));
  }

  function getNavbarFontFamily()
  {
    return stripslashes(strtr($this->_navbarFontFamily, $this->_trans));
  }

  function getNavbarFontSize()
  {
    return intval($this->_navbarFontSize);
  }

  function getNavbarFontColor()
  {
    return stripslashes(strtr($this->_navbarFontColor, $this->_trans));
  }

  function getNavbarLinkColor()
  {
    return stripslashes(strtr($this->_navbarLinkColor, $this->_trans));
  }

  function getTabBgColor()
  {
    return stripslashes(strtr($this->_tabBgColor, $this->_trans));
  }

  function getTabFontFamily()
  {
    return stripslashes(strtr($this->_tabFontFamily, $this->_trans));
  }

  function getTabFontSize()
  {
    return intval($this->_tabFontSize);
  }

  function getTabFontColor()
  {
    return stripslashes(strtr($this->_tabFontColor, $this->_trans));
  }

  function getTabLinkColor()
  {
    return stripslashes(strtr($this->_tabLinkColor, $this->_trans));
  }

  function isTabFontBold()
  {
    return ($this->_tabFontBold == true);
  }

  function getTableBorderColor()
  {
    return stripslashes(strtr($this->_tableBorderColor, $this->_trans));
  }

  function getTableBorderWidth()
  {
    return intval($this->_tableBorderWidth);
  }

  function getTableCellPadding()
  {
    return intval($this->_tableCellPadding);
  }

  function getThemeNameError()
  {
    return $this->_themeNameError;
  }

  function getTitleBgColorError()
  {
    return $this->_titleBgColorError;
  }

  function getTitleFontFamilyError()
  {
    return $this->_titleFontFamilyError;
  }

  function getTitleFontSizeError()
  {
    return $this->_titleFontSizeError;
  }

  function getTitleFontColorError()
  {
    return $this->_titleFontColorError;
  }

  function getBodyBgColorError()
  {
    return $this->_bodyBgColorError;
  }

  function getBodyFontFamilyError()
  {
    return $this->_bodyFontFamilyError;
  }

  function getBodyFontSizeError()
  {
    return $this->_bodyFontSizeError;
  }

  function getBodyFontColorError()
  {
    return $this->_bodyFontColorError;
  }

  function getBodyLinkColorError()
  {
    return $this->_bodyLinkColorError;
  }

  function getErrorColorError()
  {
    return $this->_errorColorError;
  }

  function getNavbarBgColorError()
  {
    return $this->_navbarBgColorError;
  }

  function getNavbarFontFamilyError()
  {
    return $this->_navbarFontFamilyError;
  }

  function getNavbarFontSizeError()
  {
    return $this->_navbarFontSizeError;
  }

  function getNavbarFontColorError()
  {
    return $this->_navbarFontColorError;
  }

  function getNavbarLinkColorError()
  {
    return $this->_navbarLinkColorError;
  }

  function getTabBgColorError()
  {
    return $this->_tabBgColorError;
  }

  function getTabFontFamilyError()
  {
    return $this->_tabFontFamilyError;
  }

  function getTabFontSizeError()
  {
    return $this->_tabFontSizeError;
  }

  function getTabFontColorError()
  {
    return $this->_tabFontColorError;
  }

  function getTabLinkColorError()
  {
    return $this->_tabLinkColorError;
  }

  function getTableBorderColorError()
  {
    return $this->_tableBorderColorError;
  }

  function getTableBorderWidthError()
  {
    return $this->_tableBorderWidthError;
  }

  function getTableCellPaddingError()
  {
    return $this->_tableCellPaddingError;
  }

  function getCount()
  {
    return intval($this->_count);
  }

  /**
   ********************************************************************
   * Setter methods for all fields
   ********************************************************************
   * @param string $value new value to set
   * @return void
   * @access public
   */
  function setIdTheme($value)
  {
    $this->_idTheme = intval($value);
  }

  function setThemeName($value)
  {
    $value = trim(htmlentities(strip_tags($value, ALLOWED_HTML_TAGS)));
    $this->_themeName = ((get_magic_quotes_gpc()) ? $value : addslashes($value));
  }

  function setTitleBgColor($value)
  {
    $value = trim(htmlentities(strip_tags($value, ALLOWED_HTML_TAGS)));
    $value = strtolower($value);
    $this->_titleBgColor = ((get_magic_quotes_gpc()) ? $value : addslashes($value));
  }

  function setTitleFontFamily($value)
  {
    $value = trim(htmlentities(strip_tags($value, ALLOWED_HTML_TAGS)));
    $this->_titleFontFamily = ((get_magic_quotes_gpc()) ? $value : addslashes($value));
  }

  function setTitleFontSize($value)
  {
    $temp = intval($value);
    $this->_titleFontSize = (($temp == 0) ? THEME_TITLE_FONT_SIZE : $temp);
  }

  function setTitleFontBold($value)
  {
    $this->_titleFontBold = (($value) ? true : false);
  }

  function setTitleFontColor($value)
  {
    $value = trim(htmlentities(strip_tags($value, ALLOWED_HTML_TAGS)));
    $value = strtolower($value);
    $this->_titleFontColor = ((get_magic_quotes_gpc()) ? $value : addslashes($value));
  }

  function setTitleAlign($value)
  {
    $value = trim(htmlentities(strip_tags($value, ALLOWED_HTML_TAGS)));
    $this->_titleAlign = ((get_magic_quotes_gpc()) ? $value : addslashes($value));
  }

  function setBodyBgColor($value)
  {
    $value = trim(htmlentities(strip_tags($value, ALLOWED_HTML_TAGS)));
    $value = strtolower($value);
    $this->_bodyBgColor = ((get_magic_quotes_gpc()) ? $value : addslashes($value));
  }

  function setBodyFontFamily($value)
  {
    $value = trim(htmlentities(strip_tags($value, ALLOWED_HTML_TAGS)));
    $this->_bodyFontFamily = ((get_magic_quotes_gpc()) ? $value : addslashes($value));
  }

  function setBodyFontSize($value)
  {
    $temp = intval($value);
    $this->_bodyFontSize = (($temp == 0) ? THEME_BODY_FONT_SIZE : $temp);
  }

  function setBodyFontColor($value)
  {
    $value = trim(htmlentities(strip_tags($value, ALLOWED_HTML_TAGS)));
    $value = strtolower($value);
    $this->_bodyFontColor = ((get_magic_quotes_gpc()) ? $value : addslashes($value));
  }

  function setBodyLinkColor($value)
  {
    $value = trim(htmlentities(strip_tags($value, ALLOWED_HTML_TAGS)));
    $value = strtolower($value);
    $this->_bodyLinkColor = ((get_magic_quotes_gpc()) ? $value : addslashes($value));
  }

  function setErrorColor($value)
  {
    $value = trim(htmlentities(strip_tags($value, ALLOWED_HTML_TAGS)));
    $value = strtolower($value);
    $this->_errorColor = ((get_magic_quotes_gpc()) ? $value : addslashes($value));
  }

  function setNavbarBgColor($value)
  {
    $value = trim(htmlentities(strip_tags($value, ALLOWED_HTML_TAGS)));
    $value = strtolower($value);
    $this->_navbarBgColor = ((get_magic_quotes_gpc()) ? $value : addslashes($value));
  }

  function setNavbarFontFamily($value)
  {
    $value = trim(htmlentities(strip_tags($value, ALLOWED_HTML_TAGS)));
    $this->_navbarFontFamily = ((get_magic_quotes_gpc()) ? $value : addslashes($value));
  }

  function setNavbarFontSize($value)
  {
    $temp = intval($value);
    $this->_navbarFontSize = (($temp == 0) ? THEME_NAVBAR_FONT_SIZE : $temp);
  }

  function setNavbarFontColor($value)
  {
    $value = trim(htmlentities(strip_tags($value, ALLOWED_HTML_TAGS)));
    $value = strtolower($value);
    $this->_navbarFontColor = ((get_magic_quotes_gpc()) ? $value : addslashes($value));
  }

  function setNavbarLinkColor($value)
  {
    $value = trim(htmlentities(strip_tags($value, ALLOWED_HTML_TAGS)));
    $value = strtolower($value);
    $this->_navbarLinkColor = ((get_magic_quotes_gpc()) ? $value : addslashes($value));
  }

  function setTabBgColor($value)
  {
    $value = trim(htmlentities(strip_tags($value, ALLOWED_HTML_TAGS)));
    $value = strtolower($value);
    $this->_tabBgColor = ((get_magic_quotes_gpc()) ? $value : addslashes($value));
  }

  function setTabFontFamily($value)
  {
    $value = trim(htmlentities(strip_tags($value, ALLOWED_HTML_TAGS)));
    $this->_tabFontFamily = ((get_magic_quotes_gpc()) ? $value : addslashes($value));
  }

  function setTabFontSize($value)
  {
    $temp = intval($value);
    $this->_tabFontSize = (($temp == 0) ? THEME_TAB_FONT_SIZE : $temp);
  }

  function setTabFontColor($value)
  {
    $value = trim(htmlentities(strip_tags($value, ALLOWED_HTML_TAGS)));
    $value = strtolower($value);
    $this->_tabFontColor = ((get_magic_quotes_gpc()) ? $value : addslashes($value));
  }

  function setTabLinkColor($value)
  {
    $value = trim(htmlentities(strip_tags($value, ALLOWED_HTML_TAGS)));
    $value = strtolower($value);
    $this->_tabLinkColor = ((get_magic_quotes_gpc()) ? $value : addslashes($value));
  }

  function setTabFontBold($value)
  {
    $this->_tabFontBold = (($value) ? true : false);
  }

  function setTableBorderColor($value)
  {
    $value = trim(htmlentities(strip_tags($value, ALLOWED_HTML_TAGS)));
    $value = strtolower($value);
    $this->_tableBorderColor = ((get_magic_quotes_gpc()) ? $value : addslashes($value));
  }

  function setTableBorderWidth($value)
  {
    $temp = intval($value);
    $this->_tableBorderWidth = (($temp == 0) ? THEME_TABLE_BORDER_WIDTH : $temp);
  }

  function setTableCellPadding($value)
  {
    $temp = intval($value);
    $this->_tableCellPadding = (($temp == 0) ? THEME_TABLE_CELL_PADDING : $temp);
  }

  function setCount($value)
  {
    $temp = intval($value);
    $this->_count = $temp; // (($temp == 0) ? 0 : $temp);
  }
} // end class
?>