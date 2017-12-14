package com.esredson.jaxrs;

public class MyExceptionResponse {
	
	private String message;
	
	private Exception cause;
	
	public MyExceptionResponse(){
		
	}

	public MyExceptionResponse(String message, Exception cause) {
		super();
		this.message = message;
		this.cause = cause;
	}

	public String getMessage() {
		return message;
	}

	public void setMessage(String message) {
		this.message = message;
	}

	public Exception getCause() {
		return cause;
	}

	public void setCause(Exception cause) {
		this.cause = cause;
	}
		
}
