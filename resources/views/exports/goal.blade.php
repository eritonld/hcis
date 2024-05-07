<table>
    <thead>
    <tr>
        <th>Employee ID</th>
        <th>Employee Name</th>
        <th>Category</th>
        <th>KPI</th>
        <th>Target</th>
        <th>UoM</th>
        <th>Weightage</th>
        <th>Type</th>
        <th>Status</th>
        <th>Approval Status</th>
        <th>Approver</th>
        <th>Initiated By</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($goals as $row)
        @php
            $formData = json_decode($row->goal->form_data, true);
        @endphp
        @if ($formData)
            @foreach ($formData as $item)
                <tr>
                    <td>{{ $row->employee_id }}</td>
                    <td>{{ $row->employee->fullname }}</td>
                    <td>{{ $row->goal->category }}</td>
                    <td>{{ $item['kpi'] }}</td>
                    <td>{{ $item['target'] }}</td>
                    <td>{{ $item['uom']==='Other' ? $item['custom_uom'] : $item['uom'] }}</td>
                    <td>{{ $item['weightage'] }}</td>
                    <td>{{ $item['type'] }}</td>
                    <td>{{ $row->goal->form_status }}</td>
                    <td>{{ $row->status }}</td>
                    <td>{{ $row->manager->fullname.' '.$row->manager->employee_id }}</td>
                    <td>{{ $row->initiated->name.' '.$row->initiated->employee_id }}</td>
                </tr>
            @endforeach
        @endif
    @endforeach
    </tbody>
</table>