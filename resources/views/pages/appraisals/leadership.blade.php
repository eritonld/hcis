<div class="form-group mb-4">
    <input type="hidden" name="formData[{{ $formIndex }}][formName]" value="{{ $name }}">
    @if(is_array($data))
        @foreach($data as $index => $dataItem)
        <div class="row fs-16">
            <div class="col-lg">
                <div class="mb-4">
                    <h4><strong>{{ $dataItem['title'] }}</strong></h4>
                    <p class="mb-3"><strong>{{ $dataItem['description'] }}</strong></p>
                    @if(is_array($dataItem['items']))
                        <ul>
                            @foreach($dataItem['items'] as $indexItem => $item)
                                <li>
                                    <div class="row mb-3 align-items-center">
                                        <div  class="col-md">
                                            <div class="mb-2 mb-lg-auto">
                                                <span>{{ $item }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-auto justify-content-end">
                                            <select class="form-select" name="formData[{{ $formIndex }}][{{ $index }}][{{ $indexItem }}][score]" id="score" required>
                                                <option value="" disabled >select</option>
                                                <option value="5"selected>Expert</option>
                                                <option value="4">Advanced</option>
                                                <option value="3">Practitioner</option>
                                                <option value="2">Comprehension</option>
                                                <option value="1">Basic</option>
                                            </select>
                                            <div class="text-danger error-message"></div>
                                        </div>
                                    </div>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>