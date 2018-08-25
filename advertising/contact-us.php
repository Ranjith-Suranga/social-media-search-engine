		<div class="row">
			<p class="justify-text">
				When you feel that you need some sort of help in this process, here we are.. to help you. So, don't worry. No matter what your issues are, we will try our best in helping you. So, please try to explain your issues as much as you can in details, then we may be able to give you best solution.
			</p>
			<form method="post" action="send-me.php">
				<!-- 1st Row -->
				<div>
					<div>
						Your Name (required)
					</div>
					<div>
						<input id="txt-name" type="text" name="name"/>
					</div>
				</div>
				<!-- 2nd Row -->
				<div>
					<div>
						Your E-mail (required)
					</div>
					<div>
						<input id="txt-mail" type="text" name="e-mail"/>
					</div>
				</div>
				<!-- 3rd Row -->
				<div>
					<div>
						Your Message (required)
					</div>
					<div>
						<textarea id="txt-message" name="message" rows=8>
						</textarea>
					</div>
				</div>	
				<input type="hidden" name="send-by" value="sura-boy"/>
				<div class="g-recaptcha" data-sitekey="6Lc4gBgTAAAAAO4UIqTWjiJyxnD90dujI_tCjb0m"></div>
				<!-- Last Row -->
				<div>
					<input type="button" value="Send" onclick="validate()"/>
				</div>			
			</form>
		</div>
		<script type="text/javascript">
			
			function validate(){

				var focusElement;

				$("#txt-name").removeClass("validation-failed");
				$("#txt-mail").removeClass("validation-failed");
				$("#txt-message").removeClass("validation-failed");

				if ( $("#txt-name").val().trim().length === 0 ){
					$("#txt-name").addClass("validation-failed");
					focusElement = "#txt-name";
				}
				if ( $("#txt-mail").val().trim().length === 0 ){
					$("#txt-mail").addClass("validation-failed");
					if (focusElement === undefined)	{
						focusElement = "#txt-mail";
					}
				}
				if ( $("#txt-message").val().trim().length === 0 ){
					$("#txt-message").addClass("validation-failed");
					if (focusElement === undefined)	{
						focusElement = "#txt-message";
					}					
				}
				if ( focusElement !== undefined ){
					$(focusElement).focus();
				}else{
					$("form").submit();
				}


			}

		</script>
