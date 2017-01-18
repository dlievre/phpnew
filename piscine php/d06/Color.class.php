<?php
/**
* 
*/
class Color
{
	public $red;
	public $green;
	public $blue;
	public static $verbose = False;
	public static $afftitle = True;
	public static $NbInstance = 0;


	function __construct(array $kwargs)
	{
		if (array_key_exists('rgb', $kwargs))
			$this->rgb($kwargs['rgb']);
		if (array_key_exists('red', $kwargs))
			$this->red = $kwargs['red'];
		if (array_key_exists('green', $kwargs))
			$this->green = $kwargs['green'];
		if (array_key_exists('blue', $kwargs))
			$this->blue = $kwargs['blue'];
		if (self::$afftitle == True)
			print($kwargs['instance']);
		if (self::$verbose == True)
			print(sprintf(' Color( red: %3d, green: %3d, blue: %3d ) constructed.', $this->red, $this->green, $this->blue).PHP_EOL);
		return;
	}

	function __destruct()
	{

		if (self::$verbose == True)
			print(sprintf('Color( red: %3d, green: %3d, blue: %3d ) destructed.', $this->red, $this->green, $this->blue).PHP_EOL);
		return;
	}

	function rgb($rgb)
	{
		// RRGGBB
		$this->red = ($rgb >> 16) & 0xFF ;
		$this->green = ($rgb >> 8) & 0xFF;
		$this->blue = $rgb & 0xFF;
		return;
	}

	function addtest()
	{

	}

	public function add($color1)
    {
        return(new Color(array('red' => $this->red + $color1->red , 'green' => $this->green + $color1->green, 'blue' => $this->blue + $color1->blue)));
    }

    public function sub($color1)
    {
        return(new Color(array('red' => $this->red - $color1->red , 'green' => $this->green - $color1->green, 'blue' => $this->blue - $color1->blue)));
    }

    public function mult($color1)
    {
        return(new Color(array('red' => $this->red * $color1->red , 'green' => $this->green * $color1->green, 'blue' => $this->blue * $color1->blue)));
    }

	function __tostring()// print($Color);
	{
		return (sprintf('Color( red: %3d, green: %3d, blue: %3d )', $this->red, $this->green, $this->blue));
	}

	function __invoke()//print($Color());
	{
		print ('invoke'.PHP_EOL);
		return;
	}

	public static function doc()// print( Color::doc() );
	{
	return file_get_contents('Color.doc.txt');
	}
}

print( Color::doc());
Color::$verbose = True;
$red     = new Color( array( 'red' => 0xff, 'green' => 0, 'blue' => 0, 'instance' => 'red  ') );
$green   = new Color( array( 'rgb' => 255 << 8 , 'instance' => 'green'));
//var_dump($green);
$blue    = new Color( array( 'red' => 0, 'green' => 0, 'blue' => 0xff, 'instance' => 'blue ' ) );

print ('Yello');
$yellow  = $red->add( $green );
$cyan    = $green->add( $blue );
$magenta = $blue->add( $red );

$white   = $red->add( $green )->add( $blue );

print( 'r '.$red     . PHP_EOL );
print( 'g '.$green   . PHP_EOL );
print( 'b '.$blue    . PHP_EOL );
print( 'y '.$yellow  . PHP_EOL );
print( 'c '.$cyan    . PHP_EOL );
print( 'm '.$magenta . PHP_EOL );
print( 'w '.$white   . PHP_EOL );

Color::$verbose = False;

$black = $white->sub( $red )->sub( $green )->sub( $blue );
print( 'Black: ' . $black . PHP_EOL );

Color::$verbose = True;

$darkgrey = new Color( array( 'rgb' => (10 << 16) + (10 << 8) + 10 ) );
print( 'darkgrey: ' . $darkgrey . PHP_EOL );
$lightgrey = $darkgrey->mult( 22.5 );
print( 'lightgrey: ' . $lightgrey . PHP_EOL );

$random = new Color( array( 'red' => 12.3, 'green' => 31.2, 'blue' => 23.1 ) );
print( 'random: ' . $random . PHP_EOL );
//print( $red     . PHP_EOL );
//$Color = new Color (array ('red' => 255,'green' => 255,'blue' => 255 ));
//print($Color->doc().PHP_EOL);
//print($Color);
//$Color = new Color (array ('rgb' => 0xFFFEFD));

//print ('fin'.PHP_EOL);

?>