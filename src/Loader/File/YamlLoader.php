<?php namespace NathanBurkett\Mesa\Loader\File;

use Symfony\Component\Yaml\Yaml;

/**
 * Class YamlLoader
 *
 * @package NathanBurkett\Mesa\Loader
 */
class YamlLoader extends AbstractFileLoader
{
    /**
     * @return \Traversable
     */
    public function load(): \Traversable
    {
        $array = Yaml::parseFile($this->getContext());

        return new \ArrayIterator($array);
    }
}
