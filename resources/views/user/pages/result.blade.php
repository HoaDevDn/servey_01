<div class="container-list-result">
    <div id="middle-wizard" class="wizard-branch wizard-wrapper" style="padding: 10px;">
        <div class="tab-bootstrap">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#home">
                        <span class="glyphicon glyphicon-adjust"></span>
                        {{ trans('result.overview') }}
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#menu1">
                        <span class="glyphicon glyphicon-asterisk"></span>
                        {{ trans('result.see_detail') }}
                    </a>
                </li>
               <!--  <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                <li><a data-toggle="tab" href="#menu3">Menu 3</a></li> -->
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="show-chart inner">
                       @if (!$status)
                            <div class="alert alert-info">
                                <p>{{ trans('temp.dont_have_result') }}</p>
                            </div>
                        @else
                            <div class="ct-data" data-number="{{ count($charts) }}" data-content="{{ json_encode($charts) }}">
                                @foreach($charts as $key => $value)
                                    <div id="container{{ $key }}" class="container-chart"></div>
                                    @if (!is_string($value['chart'][0]['answer']))
                                        <div class="container-text-question">
                                            <div class="question-chart">
                                                <h4>{{ $key + 1 }}. {{ $value['question']->content }}</h4>
                                            </div>
                                            <div class="content-chart">
                                                @foreach ($value['chart'][0]['answer'] as $key => $collection)
                                                    <div>
                                                        <h5> - {{ $collection->content }} </h5>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <table class="table">
                        <thead class="thead-default">
                            <tr>
                                <th style="width: 2%; text-align: center;">
                                    STT
                                </th>
                                <th style="width: 45%;">
                                    Question
                                </th>
                                <th style="width: 4%;">
                                    No.
                                </th>
                                <th style="width: 45%;" >
                                    Answer
                                </th>
                                <th style="width: 4%; text-align: center;" align="center">
                                    Quatily
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surveys->questions as $key => $value)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{ $value->content }}</td>
                                    <td>&nbsp</td>
                                    <td>&nbsp</td>
                                    <td>&nbsp</td>
                                </tr>
                                @foreach ($value->answers as $k => $answer)
                                    @if ($answer->type == config('survey.type_radio')
                                        || $answer->type == config('survey.type_checkbox')
                                        )
                                        <tr>
                                            <td>&nbsp</td>
                                            <td>&nbsp</td>
                                            <td>{{ $key . '.' . ++$k }}</td>
                                            <td>{{ $answer->content }}</td>
                                            <td>{{ count($answer->results) }}</td>
                                        </tr>
                                    @else
                                        @if ($answer->type == config('survey.type_other_radio')
                                            || $answer->type == config('survey.type_other_checkbox'))
                                            <tr>
                                                <td>&nbsp</td>
                                                <td>&nbsp</td>
                                                <td> {{ $key . '.' . ++$k }} </td>
                                                <td>{{ $answer->content }}</td>
                                                <td>{{ count($answer->results) }}</td>
                                            </tr>
                                        @endif
                                        @foreach ($answer->results as $r => $result)
                                            <tr>
                                                <td>&nbsp</td>
                                                <td>&nbsp</td>
                                                <td> - </td>
                                                <td>{{ $result->content }}</td>
                                                <td>&nbsp</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
            </div>
        </div>
    </div>
    <div id="bottom-wizard bottom-wizard-anwser"></div>
</div>
