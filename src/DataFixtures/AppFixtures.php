<?php

namespace App\DataFixtures;

use App\Entity\Bike;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\PropertyNormalizer;


class AppFixtures extends Fixture
{
    /**
     * @var FileLoacator
     */
    private $fileLocator;
    /**
     * @var string
     */
    private $dataSampleDir;
    /**
     * @var DecoderInterface
     */
    private $jsonEncoder;
    /**
     * @var PropertyNormalizer
     */
    private $propertyNormalizer;

    /**
     * AppFixtures constructor.
     * @param FileLocator $fileLocator
     * @param JsonEncoder $jsonEncoder
     * @param PropertyNormalizer $propertyNormalizer
     * @param string $dataSampleDir
     */
    public function __construct(FileLocator $fileLocator, JsonEncoder  $jsonEncoder, PropertyNormalizer $propertyNormalizer,  string $dataSampleDir)
    {
        $this->fileLocator = $fileLocator;
        $this->dataSampleDir = $dataSampleDir;
        $this->jsonEncoder = $jsonEncoder;
        $this->propertyNormalizer = $propertyNormalizer;
    }

    public function load(ObjectManager $manager)
    {
        $fileLocator = $this->fileLocator->locate('bikes.json', $this->dataSampleDir);
        $content = file_get_contents($fileLocator);
        $data = $this->jsonEncoder->decode($content, 'json');
        foreach ($data as $item) {
            $bike = $this->propertyNormalizer->denormalize($item, Bike::class);
            $manager->persist($bike);
        }
        $manager->flush();

    }
}
