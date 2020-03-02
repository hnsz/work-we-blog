<?php
namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Http\Request;

use App\Http\Resources\Thread as ThreadResource;

class CommentsComposer
{

        public function __construct(Request $request)
        {
                $this->commentthread = $request->post->threadstarter->commentthread;
                
                


        }
        public function compose(View $view)
        {
                $view->with('thread', $this->commentthread);
        }
}
