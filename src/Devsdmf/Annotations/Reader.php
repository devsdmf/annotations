<?php

namespace Devsdmf\Annotations;

/**
 * Class Reader
 *
 * Read annotations from Reflector implementations
 *
 * @package Devsdmf
 * @subpackage Annotations
 * @namespace Devsdmf\Annotations
 * @author Lucas Mendes de Freitas <devsdmf@gmail.com>
 * @copyright Copyright 2010-2015 (c) devSDMF Software Development Inc.
 */
class Reader implements ReaderInterface
{

    /**
     * @var ParserInterface
     */
    private $parser = null;

    /**
     * The Constructor
     *
     * @param ParserInterface $parser
     */
    public function __construct(ParserInterface $parser = null)
    {
        if (!is_null($parser)) {
            $this->parser = $parser;
        } else {
            $this->parser = new DocParser();
        }
    }

    /**
     * @inheritdoc
     */
    public function getAnnotations(\Reflector $reflector)
    {
        $this->parser->setReflector($reflector);

        $annotations = $this->parser->parse();

        $annotation = new Annotation($annotations);

        return $annotation;
    }

    /**
     * @inheritdoc
     */
    public function getAnnotation(\Reflector $reflector, $name)
    {
        $annotation = $this->getAnnotations($reflector);

        if (isset($annotation->$name)) {
            return $annotation->$name;
        } else {
            return null;
        }
    }

    /**
     * @inheritdoc
     */
    public function getClassAnnotations(\ReflectionClass $reflector)
    {
        return $this->getAnnotations($reflector);
    }

    /**
     * @inheritdoc
     */
    public function getClassAnnotation(\ReflectionClass $reflector, $name)
    {
        return $this->getAnnotation($reflector,$name);
    }

    /**
     * @inheritdoc
     */
    public function getFunctionAnnotations(\ReflectionFunction $reflector)
    {
        return $this->getAnnotations($reflector);
    }

    /**
     * @inheritdoc
     */
    public function getFunctionAnnotation(\ReflectionFunction $reflector, $name)
    {
        return $this->getAnnotation($reflector,$name);
    }

    /**
     * @inheritdoc
     */
    public function getMethodAnnotations(\ReflectionMethod $reflector)
    {
        return $this->getAnnotations($reflector);
    }

    /**
     * @inheritdoc
     */
    public function getMethodAnnotation(\ReflectionMethod $reflector, $name)
    {
        return $this->getAnnotation($reflector,$name);
    }

    /**
     * @inheritdoc
     */
    public function getObjectAnnotations(\ReflectionObject $reflector)
    {
        return $this->getAnnotations($reflector);
    }

    /**
     * @inheritdoc
     */
    public function getObjectAnnotation(\ReflectionObject $reflector, $name)
    {
        return $this->getAnnotation($reflector,$name);
    }

    /**
     * @inheritdoc
     */
    public function getPropertyAnnotations(\ReflectionProperty $reflector)
    {
        return $this->getAnnotations($reflector);
    }

    /**
     * @inheritdoc
     */
    public function getPropertyAnnotation(\ReflectionProperty $reflector, $name)
    {
        return $this->getAnnotation($reflector,$name);
    }
}
