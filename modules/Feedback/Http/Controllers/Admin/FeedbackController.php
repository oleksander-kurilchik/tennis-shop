<?php

namespace TrekSt\Modules\Feedback\Http\Controllers\Admin;


use Carbon\Carbon;
use Illuminate\Http\Request;
use TrekSt\Modules\AdminBase\Http\Controllers\AdminBaseController;
use TrekSt\Modules\Feedback\Models\Feedback;
use Validator;
use Session;
use Breadcrumbs;

class FeedbackController extends AdminBaseController
{


    public function index(Request $request)
    {
         $this->setCurrentBreadcrumbs('admin.feedback.index');
        $keyword = $request->get('search');
        $perPage = 25;

        $feedbackQuery = Feedback::query()->sortable();
        if (!empty($keyword)) {
            $feedbackQuery->where('phone', 'LIKE', '%$keyword%')
                ->orWhere('ip', 'LIKE', '%$keyword%')
                ->orWhere('name', 'LIKE', '%$keyword%')
                ->orWhere('description', 'LIKE', '%$keyword%');
        }
        $feedbacks = $feedbackQuery->orderByDesc('id')->paginate($perPage);
        return $this->view('admin.feedback.index', compact('feedbacks'));
    }

    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);
        if ($feedback->read_at === null) {
            $feedback->read_at = Carbon::now()->toDateTimeString();;
            $feedback->save();
        }
        $this->setCurrentBreadcrumbs('admin.feedback.show',$feedback);
        return $this->view('admin.feedback.show', compact('feedback'));
    }

    public function answered($id, Request $request)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->answered = true;
        $feedback->save();
        if ($request->ajax()) {
            return ['success' => true, 'message' => 'Зворотній дзвінок позначено як оброблений'];
        }
        Session::flash('flash_message', 'Повідомлення зворотнього дзвінка позначено як оброблений');
        return back();
    }

    public function destroy($id)
    {
        Feedback::destroy($id);
        Session::flash('flash_message', "Повідомлення зворотнього дзвінка '{$id}' видаленно");
        return redirect(route('admin.feedback.index'));
    }

    public function showEmail($id): FeedbackMail
    {
        $feedback = Feedback::findOrFail($id);
        return new FeedbackMail($feedback);
    }

}
