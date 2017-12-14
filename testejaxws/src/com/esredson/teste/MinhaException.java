package com.esredson.teste;

import javax.xml.ws.WebFault;

@WebFault(name="MinhaFault")
public class MinhaException extends Exception{

	private static final long serialVersionUID = 1L;
	
	public String getFaultInfo() {
		return "Esta é a fault info";
	}

}
