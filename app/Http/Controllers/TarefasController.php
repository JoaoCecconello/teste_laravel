<?php
    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\Tarefas;

    class TarefasController extends Controller {

        public function __construct(){
            $this->middleware('auth')->only(['create', 'update', 'delete']);
        }

        public function delete(Request $request, $id){
            $tarefa = Tarefas::find($id);
            unlink(public_path('/tarefas/' . $tarefa['arquivo']));

            Tarefas::where('id', $id)->delete();
            
            return redirect()->route("tarefas.listar");
        }

        public function create(Request $request){
            $data = $request -> except('_token');
            $tarefas = new Tarefas;
            $this->validate($request, $tarefas->rules, $tarefas->messages);

            $descricao = $request->input('descricao');
            $nome = $request->input('nome');
            $data = $request->input('data');

            if($request->file('arquivo')->isValid()){
                $hash = $this->validateFile($request->arquivo->extension());
                if($hash){
                    $request->arquivo->storeAs('', $hash);
                }else{
                    $erro = 'Arquivo não suportado!';
                    return view('tarefas.novaTarefa',compact('erro'));
                }
            }

            Tarefas::create(['descricao' => $descricao, 'nome' =>  $nome, 'data' => $data, 'arquivo' => $hash]);

            return redirect()->route("tarefas.listar");
        }

        public function list(Request $request, $id){
            $tarefas = Tarefas::find($id);
            $tarefas['id'] = $id;

            return view('tarefas.editarTarefa', $tarefas);
        }

        public function view(Request $request, $id){
            $tarefas = Tarefas::find($id);
            $tarefas['id'] = $id;

            return view('tarefas.visualizarTarefa', $tarefas);
        }

        public function listAll(){
            $tarefas = Tarefas::all();

            return view('tarefas.tarefas',compact('tarefas'));
        }

        public function update(Request $request){
            $data = $request -> except('_token');
            $tarefas = new Tarefas;
            $this->validate($request, $tarefas->rules, $tarefas->messages);
            
            $id = $request->input('id');
            $descricao = $request->input('descricao');
            $nome = $request->input('nome');
            $data = $request->input('data');

            if($request->has('arquivo') && $request->file('arquivo')->isValid() ){
                $tarefa = Tarefas::find($id);
                unlink(public_path('/tarefas/' . $tarefa['arquivo']));
                $hash = $this->validateFile($request->arquivo->extension());
                if($hash){
                    $request->arquivo->storeAs('', $hash);
                    Tarefas::where('id', $id)->update(['descricao' => $descricao, 'nome' =>  $nome, 'data' => $data, 'arquivo' => $hash]);
                }else{
                    $erro = 'Arquivo não suportado!';
                    return view('tarefas.novaTarefa',compact('erro'));
                }
            }else{
                Tarefas::where('id', $id)->update(['descricao' => $descricao, 'nome' =>  $nome, 'data' => $data]);
            }

            return redirect()->route("tarefas.listar");
        }

        private function validateFile($ext){
            $valid = array("jpg", "png", "jpeg");
            if (!in_array($ext,$valid)){
                return false; 
            }else{
               return md5(time()) . '.' . $ext;
            }
        }
    }
?>