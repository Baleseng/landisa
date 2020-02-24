<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Highcharts\Chart;

class HighChart extends Chart
{
  /**
   * Initializes the chart.
   *
   * @return void
   */
  public function __construct(){
  	
  	parent::__construct();

		$this->displayLegend(true);

	}

}
