<?php
  $api_key = getenv('MBTA_KEY');


  if (PHP_SAPI === 'cli') {
    $busnumber = $argv[1];
  }
  else {
    $busnumber = $_GET['busid'];
  }

  $webapi = "http://realtime.mbta.com/developer/api/v2/stopsbyroute";
  $data = '?api_key='.$api_key.'&route='.$busnumber.'&format=json';
  $url = $webapi . $data;
  //  Initiate curl
  $ch = curl_init();
  // Disable SSL verification
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  // Will return the response, if false it print the response
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  // Set the url
  curl_setopt($ch, CURLOPT_URL,$url);
  // Execute
  $result=curl_exec($ch);
  // Closing
  curl_close($ch);

  $jsonData = json_decode($result, true);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Search MBTA stop IDs, to use with ALEXA skill">
    <meta name="author" content="Sajin George">
    <link rel="icon" href="favicon.ico">

    <title>MBTA stop ID search</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">MBTA StopID Search</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="http://sajingeorge.com">About</a></li>
            <li><a href="mailto:sajin@mycrobonics.com">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <h1>MBTA stop ID lookup</h1>
      </div>

      <form action="index.php">
        <select name="busid">
        <?php
          $selected = '<option value="' .$busnumber . '" selected>' .$busnumber .'</option>';
          echo $selected;
        ?>
          <option value="blue">Blue Line</option><option value="orange">Orange line</option><option value="red">Red line</option><option value="741">Silver Line SL1</option><option value="742">Silver Line SL2</option><option value="751">Silver Line SL4</option><option value="749">Silver Line SL5</option><option value="746">Silver Line Waterfront</option><option value="701">Ct1</option><option value="747">Ct2</option><option value="708">Ct3</option><option value="1">1</option><option value="4">4</option><option value="5">5</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="2427">24/27</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="3233">32/33</option><option value="33">33</option><option value="34">34</option><option value="34E">34E</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="3738">37/38</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="4050">40/50</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="47">47</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="55">55</option><option value="57">57</option><option value="57A">57A</option><option value="59">59</option><option value="60">60</option><option value="62">62</option><option value="627">62/76</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="70A">70A</option><option value="71">71</option><option value="72">72</option><option value="725">72/75</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="8993">89/93</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="99">99</option><option value="100">100</option><option value="101">101</option><option value="104">104</option><option value="105">105</option><option value="106">106</option><option value="108">108</option><option value="109">109</option><option value="110">110</option><option value="111">111</option><option value="112">112</option><option value="114">114</option><option value="116">116</option><option value="116117">116/117</option><option value="117">117</option><option value="119">119</option><option value="120">120</option><option value="121">121</option><option value="131">131</option><option value="132">132</option><option value="134">134</option><option value="136">136</option><option value="137">137</option><option value="170">170</option><option value="171">171</option><option value="195">195</option><option value="201">201</option><option value="202">202</option><option value="210">210</option><option value="211">211</option><option value="212">212</option><option value="214">214</option><option value="214216">214/216</option><option value="215">215</option><option value="216">216</option><option value="217">217</option><option value="220">220</option><option value="221">221</option><option value="222">222</option><option value="225">225</option><option value="230">230</option><option value="236">236</option><option value="238">238</option><option value="240">240</option><option value="245">245</option><option value="325">325</option><option value="326">326</option><option value="350">350</option><option value="351">351</option><option value="352">352</option><option value="354">354</option><option value="411">411</option><option value="424">424</option><option value="426">426</option><option value="428">428</option><option value="429">429</option><option value="430">430</option><option value="434">434</option><option value="435">435</option><option value="436">436</option><option value="439">439</option><option value="441">441</option><option value="441442">441/442</option><option value="442">442</option><option value="448">448</option><option value="449">449</option><option value="450">450</option><option value="451">451</option><option value="455">455</option><option value="456">456</option><option value="459">459</option><option value="465">465</option><option value="501">501</option><option value="502">502</option><option value="503">503</option><option value="504">504</option><option value="505">505</option><option value="553">553</option><option value="554">554</option><option value="556">556</option><option value="558">558</option><option value="9701">9701</option><option value="9702">9702</option><option value="9703">9703</option>
        </select>
        <input type="submit">
      </form>
      <?php
      foreach ($jsonData['direction'] as $direction)
      {
        echo "<h2>".$direction['direction_name']."</h2>";
        echo '<table class="table">';
        echo "<thead>";
        echo "<tr>";
        echo "<th>Stop</th>";
        echo "<th>ID</th>";
        echo "<tr>";
        echo "</thead>";
        echo "<tbody>";
        foreach ($direction['stop'] as $stop) {
            echo "<tr>";
            echo "<td>".$stop["stop_name"]."</td>";
            echo "<td>".$stop["stop_id"]."</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

      }

      ?>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
