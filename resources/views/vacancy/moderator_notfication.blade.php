New vacancy:
<br><br>
<p><b>Position</b>: {{ $vacancy->vname }}</p>
<p><b>Company</b>: {{ $vacancy->vcomp }}</p>
<p><b>Requirements</b>: {{ $vacancy->vreqs }}</p>
<p><b>Salary</b>: ${{ $vacancy->vsalary }}</p>
<p><br>
<a href="/vacancy/approve/{{ $vacancy->id }}" style='color:green; margin:0 20px 0 0;'>approve</a>
<a href="/vacancy/delete/{{ $vacancy->id }}" style='color:red;'>delete</a>
</p>
