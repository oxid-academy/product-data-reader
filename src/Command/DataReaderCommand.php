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
    const MESSAGE_PRODUCT_INFO = 'The product %s (%d) costs %.2f EUR. (URL: %s).';
    const MESSAGE_NO_MATCH = 'No product was found for item number %d.';

    public function __construct(private DataReaderService $dataReaderService)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName('oxac:product-data:read')
            ->setDescription('Read data of a product.')
            ->setHelp('By providing an item number, you receive the title, final price and SEO URL of the matching product.')
            ->addArgument('itemNumber', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $itemNumber = (string) $input->getArgument('itemNumber');
        $productData = $this->dataReaderService->readDataByItemNumber($itemNumber);

        if ($productData['match']) {
            $output->writeln(
                sprintf(
                    self::MESSAGE_PRODUCT_INFO,
                    $productData['title'],
                    $itemNumber,
                    $productData['price'],
                    $productData['url']
                )
            );
        } else {
            $output->writeln(
                sprintf(
                    self::MESSAGE_NO_MATCH,
                    $itemNumber,
                )
            );
        }
        
        return Command::SUCCESS;
    }
}
