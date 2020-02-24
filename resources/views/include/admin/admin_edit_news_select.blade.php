<div class="addedit-input-option">
  <select name="section" id="section">
    <option selected='{{ $id->section }}'>{{ $id->section }}</option>
    <option value="extrovert">Extrovert</option>
    <option value="enthusiast">Enthusiast</option>
    <option value="backpacker">Backpacker</option>
    <option value="gearhead">Gearhead</option>
    <option value="9">Multimedia</option>
  </select>
</div>
<div class="addedit-input-option">
  <select name="subsection" id="subsection">
    <option selected='{{ $id->subsection }}'>{{ $id->subsection }}</option>
    <!-- EXTROVERT -->
    <option name="extrovert" value="fame">Fame</option>
    <option name="extrovert" value="screen">Screev</option>
    <option name="extrovert" value="culture">Culture</option>
    <option name="extrovert" value="fmedia">Media</option>
    <!-- ENTHUSIAST -->
    <option name="enthusiast" value="women">Women</option>
    <option name="enthusiast" value="men">Men</option>
    <option name="enthusiast" value="health">Health</option>
    <option name="enthusiast" value="style">Style</option>
    <!-- BACKPACKER -->
    <option name="backpacker" value="africa">Africa</option>
    <option name="backpacker" value="overseas">Overseas</option>
    <option name="backpacker" value="experience">Experience</option>
    <option name="backpacker" value="news">News<option>
    <!-- GEARHEAD -->
    <option name="gearhead" value="innovations">Innovations</option>
    <option name="gearhead" value="gadgets">Gadgets</option>
    <option name="gearhead" value="game">Game</option>
    <option name="gearhead" value="futuristic">Futuristic</option>
  </select>
  <span class="errorLabel"></span>
</div>