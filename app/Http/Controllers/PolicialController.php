<?php

namespace App\Http\Controllers;

use App\User;
use App\Patente;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PHPUnit\Util\Json;

class PolicialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policial = User::all();
        return view('policial/lista_policiais', compact('policial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patente = new Patente();
        return view('policial/policial_cadastrar', compact('patente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validacao = $this->Validator($request->all());
        if ($validacao->fails()) {
            return redirect()->back()
                ->withErrors($validacao->errors())
                ->withInput($request->all());
        }


        $path = $request->file("foto")->store('imagens', 'public');

        if($request->setorChefe == null){
            DB::table('users')->insert([
                'nome'              => $request->nome,
                'matricula'         => $request->matricula,
                'foto'              => $path,
                'chefe'             => $request->rad,
                'chefedoSetor'      => '',
                'chefedaGuarnicao'  => '',
                'setorAtuacao'      => $request->setor,
                'patente'           => $request->patente,
                'dataNascimento'    => $request->dataNascimento,
                'sexo'              => $request->sexo,
                'cidade'            => $request->cidade,
                'estado'            => $request->estado,
                'pelotao'           => $request->pelotao,
                'rg'                => $request->rg,
                'cpf'               => $request->cpf,
                'status'            => 'Pendente',
                'password'          => bcrypt($request->senha),
            ]);
        }else{
            DB::table('users')->insert([
                'nome'              => $request->nome,
                'matricula'         => $request->matricula,
                'foto'              => $path,
                'chefe'             => $request->rad,
                'chefedoSetor'      => $request->setorChefe,
                'chefedaGuarnicao'  => $request->Chefeguarnicao,
                'setorAtuacao'      => $request->setor,
                'patente'           => $request->patente,
                'dataNascimento'    => $request->dataNascimento,
                'sexo'              => $request->sexo,
                'cidade'            => $request->cidade,
                'estado'            => $request->estado,
                'pelotao'           => $request->pelotao,
                'rg'                => $request->rg,
                'cpf'               => $request->cpf,
                'status'            => 'Pendente',
                'password'          => bcrypt($request->senha),
            ]);
        }
        return redirect()->route('policial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Policial  $policial
     * @return \Illuminate\Http\Response
     */
    public function show(User $policial)
    {
        return view('policial/registroPolicial', compact('policial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Policial  $policial
     * @return \Illuminate\Http\Response
     */
    public function edit(User $policial)
    {
        return view('policial/policialeditar', compact('policial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Policial  $policial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $policial)
    {
        $validacao = $this->Validator($request->all());
        if ($validacao->fails()) {
            return redirect()->back()
                ->witherrors($validacao->errors())
                ->withInput($request->all());
        } else {
            if ($request->setorChefe == null) {

                $policial->nome = $request->input("nome");
                $policial->patente = $request->input('patente');
                $path = $request->file("foto")->store('imagens', 'public');
                $policial->foto = $path;
                $policial->sexo = $request->input('sexo');
                $policial->cidade = $request->input("cidade");
                $policial->dataNascimento = $request->input('dataNascimento');
                $policial->estado = $request->input("estado");
                $policial->pelotao = $request->input("pelotao");
                $policial->rg = $request->input("rg");
                $policial->chefe = $request->input('rad');
                $policial->setorAtuacao = $request->input('setor');
                $policial->chefedoSetor = '';
                $policial->chefedaGuarnicao = '';
                $policial->cpf = $request->input("cpf");
                $policial->password = bcrypt($request->input("senha"));
                $policial->status = 'Ok';
                $policial->save();
                return redirect()->route('policial.index');
            } else {

                $policial->nome = $request->input("nome");
                $policial->patente = $request->input('patente');
                $path = $request->file("foto")->store('imagens', 'public');
                $policial->foto = $path;
                $policial->sexo = $request->input('sexo');
                $policial->cidade = $request->input("cidade");
                $policial->dataNascimento = $request->input('dataNascimento');
                $policial->estado = $request->input("estado");
                $policial->pelotao = $request->input("pelotao");
                $policial->rg = $request->input("rg");
                $policial->chefe = $request->input('rad');
                $policial->setorAtuacao = $request->input('setor');
                $policial->chefedoSetor = $request->input('setorChefe');
                $policial->chefedaGuarnicao = $request->input('Chefeguarnicao');
                $policial->cpf = $request->input("cpf");
                $policial->password = bcrypt($request->input("senha"));
                $policial->status = 'Ok';
                $policial->save();
                return redirect()->route('policial.index');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Policial  $policial
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $policial)
    {
        $policial->delete();
        return redirect()->route('policial.index');
    }

    public function list()
    {
        $policial = User::all();

        return response()->json($policial);
    }

    public function confirmarRegistro($id)
    {
        DB::table('users')->where('id', $id)->update([
            'status' => 'Ok'
        ]);


        return redirect()->route('policial.index');
    }

    public function Validator($data)
    {
        $regras = [
            'nome'              => 'required',
            'matricula'         => 'required ',
            'foto'              => 'required',
            'patente'           => 'required',
            'dataNascimento'    => 'required',
            'sexo'              => 'required',
            'cidade'            => 'required',
            'estado'            => 'required',
            'pelotao'           => 'required',
            'rg'                => 'required',
            'cpf'               => 'required',
            'senha'             => 'required',
            'rad'               => 'required',
            'senhaConfirma'     => 'required | same:senha',
        ];

        $mensagens = [
            'required'                   => 'Campo Obrigatório',
            'matricula.unique'           => 'Matrícula já existe',
            'same'                       => 'Senhas não coincidem '
        ];

        return Validator::make($data, $regras, $mensagens);
    }
}
