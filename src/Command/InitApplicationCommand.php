<?php


namespace App\Command;


use App\Entity\Role;
use App\Entity\State;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InitApplicationCommand extends Command
{
    protected static $defaultName = 'app:init-app';

    private const USERNAME = 'root';
    private const PASSWORD = 'password';

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct(null);
        $this->entityManager = $entityManager;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $adminRole = $this->createRoles();
            $this->createRoot($adminRole);
        } catch(\Exception $e) {
            return Command::FAILURE;
        }
        return Command::SUCCESS;
    }

    private function createRoot(Role $role): void
    {
        $user = (new User())
            ->setFirstname(self::USERNAME)
            ->setLastname('rootovič')
            ->setPassword(self::PASSWORD)
            ->addRole($role);

            $this->entityManager->persist($user);
            $this->entityManager->flush();
    }

    private function createRoles(): Role
    {
        $role = (new Role())
            ->setName("ROLE_ADMIN")
            ->setAlias("Administrátor");

        $this->entityManager->persist($role);
        $this->entityManager->flush();
        return $role;
    }

    private function createStates(): void
    {
        $state = (new State())
            ->setName('WIP');
    }
}