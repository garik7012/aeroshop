<!-- /.row -->
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Дополнительные параметры</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table">
                    <tr>
                        <th>Параметр</th>
                        <th>Значение (ру)</th>
                        <th>Значение (укр)</th>
                        <th>Значение (en)</th>
                        <th>Ед. изм</th>
                        <th>Удалить</th>
                    </tr>
                    @foreach($product->properties as $property)
                        <tr>
                            <td>{{$property->key->ru_title}}</td>
                            <td>{{$property->ru_value}}</td>
                            <td>{{$property->uk_value}}</td>
                            <td>{{$property->en_value}}</td>
                            <td>{{$property->unit->ru_title ?? ''}}</td>
                            <td><a href="{{route('admin.products.delete-property', $product->id)}}" class="need-confirm text-danger" data-id='{{$property->id}}' data-item="параметр"><i class="fa fa-trash"></i> удалить</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- /.box-body -->
            <!-- form start -->
            <form role="form" action="{{route('admin.products.add-property', $product->id)}}" method="post">
                <div class="box-footer">
                    <div class="row">
                        <div class="col-xs-3 form-group">
                            <label for="propKey">Параметр</label>
                            <select name="key_id" id="propKey" class="form-control">
                                @foreach($propertyKeys as $propertyKey)
                                    <option value="{{$propertyKey->id}}">{{$propertyKey->ru_title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-2 form-group">
                            <label for="propRuVal">Значение (ру)</label>
                            <input type="text" name="ru_value" value="{{old('ru_value')}}" class="form-control">
                        </div>
                        <div class="col-xs-2 form-group">
                            <label for="propUkrVal">Значение (укр)</label>
                            <input type="text" name="uk_value" value="{{old('uk_value')}}" class="form-control">
                        </div>
                        <div class="col-xs-2 form-group">
                            <label for="propEnVal">Значение (en)</label>
                            <input type="text" name="en_value" value="{{old('en_value')}}" class="form-control">
                        </div>
                        <div class="col-xs-1 form-group" style="padding: 0">
                            <label for="propUnit">Ед.(необяз)</label>
                            <select name="unit_id" id="propUnit" class="form-control" style="padding: 3px">
                                <option value=""></option>
                                @foreach($units as $unitKey)
                                    <option value="{{$unitKey->id}}">{{$unitKey->ru_title}}</option>
                                @endforeach
                            </select></div>
                        <div class="col-xs-2 form-group">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-success form-control">Добавить</button>
                        </div>
                    </div>
                    <a href="{{route('admin.products.all')}}" class="btn btn-default">Назад к списку</a>
                </div>
                {{csrf_field()}}
            </form>
        </div>
        <!-- /.box -->
    </div>
</div>
<!-- /.row -->