<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $product;

    public function __construct(Product $product ){
        $this->product = $product;
    }


    public function index()
    {
        $products = $this->product->paginate(3);
        $title = 'Meu titulo';
        return view('painel.products.index', compact('products','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastro de Produto';
        $categorys = ['eletronicos','moveis','limpeza','banho'];

        return view('painel.products.create-edit', compact('title','categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $dataForm = $request->except('_token');
        $dataForm['active'] = ( !isset($dataForm['active'])) ? 0 : 1;

        $this->validate($request, $this->product->rules);

        $insert = $this->product->insert($dataForm);
        if($insert){
            return redirect()->route('produtos.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   

        $product = $this->product->find($id);
        $title = $product->name;
        return view('painel.products.show', compact('product', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $title = 'Cadastro de Produto';
        $categorys = ['eletronicos','moveis','limpeza','banho'];
        $product = $this->product->find($id);
        return view('painel.products.create-edit', compact('product','title','categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataForm = $request->all();
        $product = $this->product->find($id);
        $update = $product->update($dataForm);
        $dataForm['active'] = ( !isset($dataForm['active'])) ? 0 : 1;
        
        if($update){
            return redirect()->route('produtos.index');
        } else {
            return redirect()->route('produtos.edit', $id )->wih(['errors' => 'Não foi possivel alterar o dado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $product = $this->product->find($id);
        $deletar = $product->delete();

        if($deletar){
            return redirect()->route('produtos.index');
        } 

      
    }

    public function tests(){


        //return 'testes';
        /*$prod = $this->product;
        $prod->name = "teste tecnologia da informação";
        $prod->number = 123456;
        $prod->image = 'teste.png';
        $prod->active = true;
        $prod->category = 'eletronicos';
        $prod->description = 'Description aqui';
        $insert =  $prod->save();*/

        /*
        $insert = $this->product->create([
            'name'          => 'teste 1',
            'number'        => 4698,
            'image'        => 'teste1.png',
            'active'        => true,
            'category'      => 'eletronicos',
            'description'   => 'nova descrição'
        ]);

        if( $insert ){
            return 'Inserido com sucesso ';
        }*/


        /*$prod = $this->product->find(1);
        $update = $prod->update([
            'name' => 'Update',
            'number' => '202020',
            'image' => 'teste_update.png',
            'active' => false
        ]);

        
        if( $update ){
            return 'Alterado com sucesso ';
        }*/

        /*$prod = $this->product->find(2);
        $delete = $prod->delete();
        
        if( $delete ){
            return 'Deletado com sucesso ';
        }*/
    


            
    }
}
