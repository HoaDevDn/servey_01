<div >
    <table class="table-invited table table-hover">
        <thead>
            <tr>
                <th>{{ trans('survey.name') }}</th>
                <th>{{ trans('survey.reciever_date') }}</th>
                <th>{{ trans('survey.sender') }}</th>
                <th>{{ trans('survey.status') }}</th>
                <th>{{ trans('survey.detail') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invites as $key => $invite)
                <tr>
                    <td>
                        <a href="{{ action(($invite->survey->feature)
                            ? 'AnswerController@answerPublic'
                            : 'AnswerController@answerPrivate', [
                                'token' => $invite->survey->token,
                        ]) }}">
                            {{ $invite->survey->title }}
                        </a>
                    </td>
                    <td>
                        {{ $invite->created_at->format('M d Y') }}
                    </td>
                    <td>
                        {{ ($invite->sender) ? $invite->sender->email : $invite->mail }}
                    </td>
                    <td style="width: 14%;">
                        {!! ($invite->status) ? "<span class='glyphicon glyphicon-remove-sign' style='margin-right: 4%'></span>" . trans('survey.not_yet')
                        : "<span class='glyphicon glyphicon-ok-sign' style='margin-right: 4%'></span>" . trans('survey.answered') !!}
                    </td>
                    <td>
                        <?php
                            $deadline = $invite->survey->deadline;
                        ?>
                        @if (in_array($invite->survey_id, $settings)
                        || (!Carbon\Carbon::parse($deadline)->gt(Carbon\Carbon::now()) && !empty($deadline))
                        )
                            {{ trans('survey.closed') }}
                        @else
                            <a href="{{ action(($invite->survey->feature)
                                ? 'AnswerController@answerPublic'
                                : 'AnswerController@answerPrivate', [
                                    'token' => $invite->survey->token,
                            ]) }}">
                                {{ trans('survey.link') }}
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
