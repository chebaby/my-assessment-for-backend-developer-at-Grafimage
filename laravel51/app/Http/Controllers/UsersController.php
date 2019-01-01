<?php

namespace Jde\Http\Controllers;

use Jde\Http\Requests\RegistrationRequest;
use Jde\Http\Controllers\Controller;
use Jde\Mailers\JdeMailer;
use Jde\User;
use Notification;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('dashboard.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrationRequest $request, JdeMailer $mailer)
    {
        $user = User::create($request->all());

        $mailer->sendEmailNotificationTo($user);

        flash()->success('Votre demande d\'inscription a bien été prise en compte. Vous recevrez d\'ici peu une confirmation par email');

        return redirect()->route('survey.notification');
    }

    /**
     * Display the specified resource.
     *
     * @param  Eloquent Model  $user
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
       return view('dashboard.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Eloquent Model  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        return view('dashboard.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegistrationRequest $request, JdeMailer $mailer, $user)
    {
        $user->update($request->all());

        $mailer->sendEmailNotificationTo($user);

        flash()->success("Inscription effectuer. une confirmation par email est envoyé à $user->last_name par $user->email");

        return redirect()->route('dashboard.users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        $user->delete();

        flash()->info('Le client est supprimer');

        return redirect()->route('dashboard.users');
    }
}
