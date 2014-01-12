<?php
class GoogleMapHelperTest extends PHPUnit_Framework_TestCase {
    protected $googleMap;

    protected function setUp() {
      $this->googleMap = new GoogleMapHelper();
    }

    public function testConstructor() {
      $this->assertNotNull($this->googleMap);
      $this->assertInstanceOf("GoogleMapHelper", $this->googleMap);
    }

    public function testMap() {
      $mapJs = $this->googleMap->map();

      // assert that the map canvas is in the HTML
      $expectedMapDiv = "<div id='map_canvas' style='width:800px; height:800px; style'></div>";
      $this->assertTrue(strpos($mapJs, $expectedMapDiv) !== false);

      // assert that the map canvas is in the HTML
      $mapJs = $this->googleMap->map([
        "id" => "new_map_canvas",
        "width" => "600px",
        "height" => "500px"
      ]);
      $expectedMapDiv = "<div id='new_map_canvas' style='width:600px; height:500px; style'></div>";
      $this->assertTrue(strpos($mapJs, $expectedMapDiv) !== false);
    }
}

?>