<?php
namespace WebDevJona\ManyToManyTests\Controller;

/*
 * This file is part of the WebDevJona.ManyToManyTests package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;
use Neos\Flow\Persistence\PersistenceManagerInterface;
use WebDevJona\ManyToManyTests\Domain\Model\Post;
use WebDevJona\ManyToManyTests\Domain\Model\User;
use WebDevJona\ManyToManyTests\Domain\Repository\UserRepository;

class StandardController extends ActionController
{
    /**
     * @var UserRepository
     * @Flow\Inject
     */
    protected $userRepository;

    /**
     * @var PersistenceManagerInterface
     * @Flow\Inject
     */
    protected $persistenceManager;

    /**
     * @return void
     */
    public function indexAction()
    {
        $this->view->assign('users', $this->userRepository->findAll());
    }

    public function addUserAction()
    {
        $user = new User();
        $user->setName('Test User');
        $this->userRepository->add($user);
        $this->persistenceManager->persistAll();
        $this->view->assign('user', $user);
    }

    public function addFavoriteAction(User $user)
    {
        $post = new Post();
        $post->setTitle('Test Post');
        $user->addFavorite($post);
        $this->userRepository->update($user);
        $this->persistenceManager->persistAll();
        $this->view->assign('user', $user);
    }
}
