<?php

namespace App\Command;

use App\Entity\User;
use App\Manager\UserManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

/**
 * @author Egor Zyuskin <ezyuskin@amaxlab.ru>
 */
class UserCreateCommand extends Command
{
    const COMMAND_NAME = 'app:user:create';

    /**
     * @var UserManager
     */
    private $userManager;

    /**
     * CreateAdminCommand constructor.
     * @param UserManager $userManager
     */
    public function __construct(UserManager $userManager)
    {
        parent::__construct(null);

        $this->userManager = $userManager;
    }

    /**
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName(self::COMMAND_NAME)
            ->setDescription('Creates a new user.')
            ->setHelp('This command allows you to create a user...')
            ->addArgument('username', InputArgument::OPTIONAL, 'The username of the user.')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $username = $input->getArgument('username');

        if (!$username) {
            $username = $this->question($input, $output, 'Enter username: ');
        }

        $password = $this->question($input, $output, 'Password: ', true);
        $passwordConfirm = $this->question($input, $output, 'Confirm password: ', true);

        if ($password != $passwordConfirm) {
            $output->writeln('Password don\'t match');

            return;
        }

        $this->userManager->create(
            (new User())
            ->setUsername($username)
            ->setPassword($password)
        );

        $output->writeln(sprintf('<info>User: %s created</info>', $username));
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @param string $question
     * @param bool $hidden
     * @return string
     */
    private function question(InputInterface $input, OutputInterface $output, string $question, bool $hidden = false)
    {
        $helper = $this->getHelper('question');
        $question = new Question($question);
        $question->setValidator(function ($value) {
            if (trim($value) == '') {
                throw new \Exception('The value cannot be empty');
            }

            return $value;
        });
        $question->setHidden($hidden);

        return $helper->ask($input, $output, $question);
    }
}
