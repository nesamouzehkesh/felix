<?php

namespace AppBundle\Library\Component;

/**
 * This class can be used to generate some Lorem Ipsum text and used only for test
 * purposes. 
 * 
 * $generator = new LoremIpsumGenerator();
 * 
 * $testTile = $generator->getTitle(); // "Tellus ullamcorper vulputate praesent commodo "
 * $testUrl = $generator->getUrl(); // "www.ultricies.org/vel/risus/torquent/quisque/"
 * $testEmail = $generator->getEmail(); // "mollis@sollicitudinnostracubilia.info"
 * $testDescription = $generator->getDescription();
 * 
 */
class LoremIpsumGenerator 
{
    /**
     *
     * @var type 
     */
    private $words;
    
    /**
     *
     * @var type 
     */
    private $wordsPerParagraph;
    
    /**
     *
     * @var type 
     */
    private $wordsPerSentence;
    
    /**
     * 
     * @param type $wordsPer
     */
    public function __construct($wordsPer = 100)
    {
        $this->wordsPerParagraph = $wordsPer;
        $this->wordsPerSentence = 24.460;
        $this->words = array(
            'lorem', 'ipsum', 'dolor', 'sit', 'amet', 'consectetur', 'adipiscing', 'elit', 'curabitur', 'vel', 'hendrerit', 'libero', 'eleifend', 'blandit', 'nunc', 'ornare', 'odio', 'ut', 'orci', 'gravida', 'imperdiet', 'nullam', 'purus',  'lacinia', 'a', 'pretium', 'quis', 'congue', 'praesent', 'sagittis', 'laoreet', 'auctor', 'mauris', 'non', 'velit', 'eros', 'dictum', 'proin', 'accumsan', 'sapien', 'nec', 'massa', 'volutpat', 'venenatis', 'sed', 'eu', 'molestie', 'lacus', 'quisque', 'porttitor', 'ligula', 'dui', 'mollis', 'tempus', 
            'at', 'magna', 'vestibulum', 'turpis', 'ac', 'diam', 'tincidunt', 'id', 'condimentum', 'enim', 'sodales', 'in', 'hac', 'habitasse', 'platea', 'dictumst', 'aenean', 'neque', 'fusce', 'augue', 'leo', 'eget', 'semper', 'mattis', 'tortor', 'scelerisque', 'nulla', 'interdum', 'tellus', 'malesuada', 'rhoncus', 'porta', 'sem', 'aliquet', 'et', 'nam', 'suspendisse', 'potenti', 'vivamus', 'luctus', 'fringilla', 'erat', 'donec', 'justo', 'vehicula', 'ultricies', 'varius', 'ante', 'primis', 'faucibus', 'ultrices', 'posuere', 'cubilia', 
            'curae', 'etiam', 'cursus', 'aliquam', 'quam', 'dapibus', 'nisl', 'feugiat', 'egestas', 'class', 'aptent', 'taciti', 'sociosqu', 'ad', 'litora', 'torquent', 'per', 'conubia', 'nostra', 'inceptos', 'himenaeos', 'phasellus', 'nibh', 'pulvinar', 'vitae', 'urna', 'iaculis', 'lobortis', 'nisi', 'viverra', 'arcu', 'morbi', 'pellentesque', 'metus', 'commodo', 'ut', 'facilisis', 'felis', 'tristique', 'ullamcorper', 'placerat', 'aenean', 'convallis', 'sollicitudin', 'integer', 'rutrum', 'duis', 'est', 'etiam', 'bibendum', 'donec', 
            'pharetra', 'vulputate', 'maecenas', 'mi', 'fermentum', 'consequat', 'suscipit', 'aliquam', 'habitant', 'senectus', 'netus', 'fames', 'quisque', 'euismod', 'curabitur', 'lectus', 'elementum', 'tempor', 'risus', 'cras'
            );
    }
    
    /**
     * 
     * @param type $count
     * @param type $format
     * @param type $loremipsum
     * @return string
     */
    public function getContent($count, $format = 'html', $loremipsum = false)
    {
        $format = strtolower($format);

        if ($count <= 0) {
            return '';
        }

        switch($format) {
            case 'txt':
                return $this->getText($count, $loremipsum);
            case 'plaintxt':
                return $this->getPlain($count, $loremipsum);
            case 'plain':
                return $this->getPlain($count, $loremipsum, true, false);
            default:
                return $this->getHTML($count, $loremipsum);
        }
    }
    
    /**
     * 
     * @param type $noHeader
     * @return type
     */
    public function getUrl($noHeader = false)
    {
        $urn = str_replace(' ', '/', strtolower($this->getContent(rand(1 , 4), 'plain')));        
        if ($noHeader) {
            return $urn;
        }
        
        $typeArray = array('net', 'com', 'org', 'info');
        $type = $typeArray[rand(0, 3)];
        $url = sprintf(
            "www.%s.%s/", 
            str_replace(' ', '', strtolower($this->getContent(1, 'plain'))),
            $type
            );
        
        return $url . $urn;
    }
    
    /**
     * Genarate email address (Generated emails are not guarantee to be unique)
     * 
     * @return type
     */
    public function getEmail()
    {
        $userName = str_replace(' ', '', strtolower($this->getContent(rand(1, 3), 'plain')));
        $domain = str_replace(' ', '', strtolower($this->getContent(rand(1, 3), 'plain')));
        $typeArray = array('net', 'com', 'org', 'info');
        $type = $typeArray[rand(0, 3)];
        
        return $userName . '@' . $domain . '.' . $type;
    }    

    /**
     * 
     * @return type
     */
    public function getName()
    {
        return $this->getContent(1, 'plain');
    }    
    
    /**
     * 
     * @param type $format
     * @return type
     */
    public function getTitle($format = 'plain')
    {
        return $this->getContent(rand(2 , 5), $format);
    }
    
    /**
     * 
     * @param type $format
     * @return type
     */
    public function getDescription($format = 'plain')
    {
        return $this->getContent(rand(20 , 100), $format);
    }

    private function getWords(&$arr, $count, $loremipsum)
    {
        $i = 0;
        if ($loremipsum) {
            $i = 2;
            $arr[0] = 'lorem';
            $arr[1] = 'ipsum';
        }

        for ($i; $i < $count; $i++) {
            $index = array_rand($this->words);
            $word = $this->words[$index];
            //echo $index . '=>' . $word . '<br />';

            if ($i > 0 && $arr[$i - 1] == $word) {
                $i--;
            } else {
                $arr[$i] = $word;
            }
        }
        
       $arr[0] = ucfirst($arr[0]);
    }

    private function getPlain($count, $loremipsum, $returnStr = true, $punctuate = true)
    {
        $words = array();
        $this->getWords($words, $count, $loremipsum);
        //print_r($words);

        $delta = $count;
        $curr = 0;
        $sentences = array();
        while ($delta > 0) {
            $senSize = $this->gaussianSentence();
            //echo $curr . '<br />';
            if (($delta - $senSize) < 4)
                $senSize = $delta;

            $delta -= $senSize;

            $sentence = array();
            for ($i = $curr; $i < ($curr + $senSize); $i++)
                $sentence[] = $words[$i];
            if ($punctuate) {
                $this->punctuate($sentence);
            }
            $curr = $curr + $senSize;
            $sentences[] = $sentence;
        }

        if($returnStr) {
            $output = '';
            foreach($sentences as $s)
                foreach($s as $w)
                    $output .= $w . ' ';

            return $output;
        }
        else {
            return $sentences;
        }
    }

    private function getText($count, $loremipsum)
    {
        $sentences = $this->getPlain($count, $loremipsum, false);
        $paragraphs = $this->getParagraphArr($sentences);

        $paragraphStr = array();
        foreach ($paragraphs as $p) {
            $paragraphStr[] = $this->paragraphToString($p);
        }

        $paragraphStr[0] = "\t" . $paragraphStr[0];
        
        return implode("\n\n\t", $paragraphStr);
    }

    private function getParagraphArr($sentences)
    {
        $wordsPer = $this->wordsPerParagraph;
        $sentenceAvg = $this->wordsPerSentence;
        $total = count($sentences);

        $paragraphs = array();
        $pCount = 0;
        $currCount = 0;
        $curr = array();

        for($i = 0; $i < $total; $i++) {
            $s = $sentences[$i];
            $currCount += count($s);
            $curr[] = $s;
            if ($currCount >= ($wordsPer - round($sentenceAvg / 2.00)) || $i == $total - 1) {
                $currCount = 0;
                $paragraphs[] = $curr;
                $curr = array();
            }
        }

        return $paragraphs;
    }

    private function getHTML($count, $loremipsum)
    {
        $sentences = $this->getPlain($count, $loremipsum, false);
        $paragraphs = $this->getParagraphArr($sentences);

        $paragraphStr = array();
        foreach ($paragraphs as $p) {
            $paragraphStr[] = "<p>\n" . $this->paragraphToString($p, true) . '</p>';
        }

        //add new lines for the sake of clean code
        return implode("\n", $paragraphStr);
    }

    private function paragraphToString($paragraph, $htmlCleanCode = false)
    {
        $paragraphStr = '';
        foreach ($paragraph as $sentence) {
            foreach($sentence as $word)
                $paragraphStr .= $word . ' ';

            if($htmlCleanCode)
                $paragraphStr .= "\n";
        }
        
        return $paragraphStr;
    }

    /*
    * Inserts commas and periods in the given
    * word array.
    */
    private function punctuate(&$sentence)
    {
        $count = count($sentence);
        $sentence[$count - 1] = $sentence[$count - 1] . '.';

        if ($count < 4) {
            return $sentence;
        }

        $commas = $this->numberOfCommas($count);

        for ($i = 1; $i <= $commas; $i++) {
            $index = (int) round($i * $count / ($commas + 1));

            if ($index < ($count - 1) && $index > 0) {
                $sentence[$index] = $sentence[$index] . ',';
            }
        }
    }

    /*
    * Determines the number of commas for a
    * sentence of the given length. Average and
    * standard deviation are determined superficially
    */
    private function numberOfCommas($len)
    {
        $avg = (float) log($len, 6);
        $stdDev = (float) $avg / 6.000;

        return (int) round($this->gauss_ms($avg, $stdDev));
    }

    /*
    * Returns a number on a gaussian distribution
    * based on the average word length of an english
    * sentence.
    * Statistics Source:
    *	http://hearle.nahoo.net/Academic/Maths/Sentence.html
    *	Average: 24.46
    *	Standard Deviation: 5.08
    */
    private function gaussianSentence()
    {
        $avg = (float) 24.460;
        $stdDev = (float) 5.080;

        return (int) round($this->gauss_ms($avg, $stdDev));
    }

    /*
    * The following three functions are used to
    * compute numbers with a guassian distrobution
    * Source:
    * 	http://us.php.net/manual/en/function.rand.php#53784
    */
    private function gauss()
    {   
        // N(0,1)
        // returns random number with normal distribution:
        //   mean=0
        //   std dev=1

        // auxilary vars
        $x = $this->random_0_1();
        $y = $this->random_0_1();

        // two independent variables with normal distribution N(0,1)
        $u = sqrt(-2 * log($x)) * cos(2 * pi() * $y);
        $v = sqrt(-2 * log($x)) * sin(2 * pi() * $y);

        // i will return only one, couse only one needed
        return $u;
    }

    private function gauss_ms($m = 0.0, $s = 1.0)
    {
        return $this->gauss() * $s + $m;
    }

    private function random_0_1()
    {
        return (float)rand()/(float)getrandmax();
    }
}