<style>html,body { padding: 0; margin:0; }</style>
<div style="font-family:Arial,Helvetica,sans-serif; line-height: 1.5; font-weight: normal; font-size: 15px; color: #2F3044; min-height: 100%; margin:0; padding:0; width:100%; background-color:#edf2f7">
	<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;margin:0 auto; padding:0; max-width:600px">
		<tbody>
			<tr>
				<td align="center" valign="center" style="text-align:center; padding: 40px">
					<a href="https://keenthemes.com" rel="noopener" target="_blank">
						<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/media/logos/logo-1645494239.jpg'))) }}" class="logo" alt="Logo">
					</a>
				</td>
			</tr>
			<tr>
				<td align="left" valign="center">
					<div style="text-align:left; margin: 0 20px; padding: 40px; background-color:#ffffff; border-radius: 6px">
						<!--begin:Email content-->
						<div style="padding-bottom: 30px; font-size: 17px;">
							<strong>Welcome to Shipment Tracking System!</strong>
						</div>
						<div style="padding-bottom: 30px">Hello MR : {{ $user?->name }},</div>
						<div style="padding-bottom: 30px">Email : {{ $user?->email }}</div>
						<div style="padding-bottom: 30px">Password : {{ $password }}</div>
						{{-- <a href="https://keenthemes.com/support" rel="noopener" target="_blank" style="text-decoration:none;color: #7239EA">https://keenthemes.com/support</a>. --}}
						<!--end:Email content-->
						<div style="padding-bottom: 10px">Kind regards,
						<br>The Shipment Tracking Team.
						<tr>
							<td align="center" valign="center" style="font-size: 13px; text-align:center;padding: 20px; color: #6d6e7c;">
								<p>Floor 5, 450 Avenue of the Red Field, SF, 10050, USA.</p>
								<p>Copyright ©
								<a href="https://keenthemes.com" rel="noopener" target="_blank">Keenthemes</a>.</p>
							</td>
						</tr></br></div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>