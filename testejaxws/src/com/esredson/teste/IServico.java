package com.esredson.teste;

import javax.jws.WebMethod;
import javax.jws.WebParam;
import javax.jws.WebResult;
import javax.jws.WebService;

@WebService(targetNamespace="meuTargetNamespace", portName="meuPortname")
public interface IServico {

	@WebMethod(operationName="meuUnicoMetodo")
	@WebResult(name="meuResultado")
	public String metodo1(@WebParam(name="meuParametro") String val) throws MinhaException;
	
}
