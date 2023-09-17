<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\DateAction;


use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

date_default_timezone_set('Europe/Paris');

#[Route('/')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home_index')]
    public function index(Request $request, EntityManagerInterface $entityManager, TaskRepository $taskRepository): Response
    {

        $datefull = (new DateAction())->getFullDateTime();
        $date = (new DateAction())->getFullDate();
        $hour = (new DateAction())->getHour();
        $hours = (new DateAction())->getFullTime();

        // Get all tasks

        // dd($taskRepository->findAll());

        $task = new Task(); 
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($task);
            $entityManager->flush();

            // return $this->redirectToRoute('app_task_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'date_full' => $datefull,
            'date' => $date,
            'hour' => $hour,
            'hours' => $hours,
            'tasks' => $taskRepository->findAll(),
        ]);
    }
   

    #[Route('/task{id}', name: 'app_task_show', methods: ['GET'])]
    public function show(Task $task): Response
    {
        return $this->render('task/show.html.twig', [
            'task' => $task,
        ]);
    }

    #[Route('/task{id}/edit', name: 'app_task_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Task $task, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_task_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('task/edit.html.twig', [
            'task' => $task,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_task_delete', methods: ['POST'])]
    public function delete(Request $request, Task $task, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$task->getId(), $request->request->get('_token'))) {
            $entityManager->remove($task);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_task_index', [], Response::HTTP_SEE_OTHER);
    }
}
