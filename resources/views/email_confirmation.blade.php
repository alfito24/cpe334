<p>Dear {{ $application->user->name }},</p>

@if ($status == 'accepted')
<p>We hope this email finds you in good health and high spirits. We are pleased to inform you that you have been selected for the internship opportunity at {{ $application->job->user->company }} as {{ $application->job->position }}.</p>

<p>We were truly impressed with your application and interview, and we believe that you will be a valuable addition to our team. Your enthusiasm, qualifications, and potential were key factors in our decision to offer you this internship opportunity.</p>

<p>Before your internship begins, we will provide you with an orientation and an overview of your responsibilities and expectations. If you have any questions or need further information, please do not hesitate to contact us.</p>

<p>We are excited to welcome you to our team, and we look forward to working together to make this internship a valuable learning experience for you.</p>

<p>Once again, congratulations on your selection, and we can't wait to have you on board.</p>
@elseif($status == 'rejected')
<p>We hope this email finds you well. We would like to express our appreciation for your interest in the internship opportunity at  {{ $application->job->user->company }}. After careful consideration, we regret to inform you that we have chosen to move forward with another candidate for this position.</p>

<p>Please know that our decision was not an easy one, and we were truly impressed with your qualifications and interview performance. However, we had a limited number of positions available, and the competition was highly competitive.</p>

<p>We encourage you to continue your pursuit of internships and opportunities that align with your career goals. Your skills and experiences are valuable, and we have no doubt that you will find a suitable opportunity that matches your qualifications.</p>

<p>Thank you for your interest in  {{ $application->job->user->company }}, and we wish you the best in your future endeavors. If you have any questions or would like feedback on your application or interview, please feel free to reach out to us.</p>
@endif

<p>Best Regards,</p>
<p>Internhub</p>
