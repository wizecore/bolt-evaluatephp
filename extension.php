<?php
/**
EvaluatePHP Extension for Bolt, by Huksley
*/
namespace EvaluatePHP;

class Extension extends \Bolt\BaseExtension {
    var $content;

    /**
     * Info block for evaluatephp Extension.
     */
    function info()
    {

        $data = array(
            'name' => "EvaluatePHP",
            'description' => "Gives ability to evaluate PHP blocks.",
            'keywords' => "bolt, cms, php, evaluate, script",
            'author' => "Huksley",
            'link' => "https://github.com/wizecore/bolt-evaluatephp",
            'version' => "0.1",
            'required_bolt_version' => "1.0.2",
            'highest_bolt_version' => "1.0.2",
            'type' => "General",
            'first_releasedate' => "2013-05-21",
            'latest_releasedate' => "2013-05-21",
            'dependencies' => "",
            'priority' => 10
        );

        return $data;

    }

    /**
     * Initialize evaluatephp. Called during bootstrap phase.
     */
    function init()
    {
        // Initialize the Twig function
        $this->addTwigFunction('evaluatephp', 'twigEvaluatephp');
    }

    /**
     * Twig function {{ evaluatephp() }} in evaluatephp extension.
     */
    function twigEvaluatephp($phase) {
		global $app;
		$path = $app['paths']['current'];
		// Cache page content for further usage
		if (!$this->content) {
	    	if (strstr($path, "?")) {
				$path = substr($path, 0, strpos($path, "?"));
	    	}
	    	error_log("bolt EvaluatePHP: Reading page " . $path);
	    	$c = $app['storage']->getContent($path, array('returnsingle' => true));
	    	if (!$c) {
				die("bolt EvaluatePHP: Can`t find page: $path");
	    	}
	    	$this->content = &$c;
		}

		$html = "";
		error_log("bolt EvaluatePHP: Checking for property php_" . $phase);
		$code = $this->content["php_" . $phase];
		$result = null;
		$output = null;
		if ($code) {
			error_log("bolt EvaluatePHP: Evaluating php_" . $phase . ": " . $code);
			ob_start();
	    	$result = eval($code);
	    	$output = ob_get_contents();
	    	ob_end_clean();
	    	if ($result !== null) {
				$html = $result;
	    	}
	    	if ($output != null && $output != "") {
				$html = $output;
	    	}
		} else {
			error_log("bolt EvaluatePHP: No code in page $path property named php_" . $phase);
		}

        return new \Twig_Markup($html, 'UTF-8');
    }
}
?>