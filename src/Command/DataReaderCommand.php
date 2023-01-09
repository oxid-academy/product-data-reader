<?php

declare(strict_types=1);

namespace OxidAcademy\ProductDataReader\Command;

use OxidAcademy\ProductDataReader\DataReaderService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DataReaderCommand extends Command
{
    const MESSAGE_PRODUCTINFO = 'The product %s (%d) costs %.2f EUR.';
    const MESSAGE_NOMATCH = 'No product was found for item number %d.';

    public function __construct(DataReaderService $dataReaderService)
    {
        $this->dataReaderService = $dataReaderService;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('oxac:product-data:read')
            ->setDescription('Read title and price of a product.')
            ->setHelp('Read the title and the final price of a product selected by providing a item number.')
            ->addArgument('itemNumber', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $itemNumber = (int) $input->getArgument('itemNumber');
        $productData = $this->dataReaderService->readDataByItemNumber($itemNumber);

        if ($productData['match']) {
            $output->writeln(
                sprintf(
                    self::MESSAGE_PRODUCTINFO,
                    $productData['title'],
                    $itemNumber,
                    $productData['price']
                )
            );
        } else {
            $output->writeln(
                sprintf(
                    self::MESSAGE_NOMATCH,
                    $itemNumber,
                )
            );
        }
        
        return 0;
    }
}
